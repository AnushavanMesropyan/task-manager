<?php

class AdminController {
    public function actionLogin() {
        if (Admin::isGuest()) {
            if (isset($_POST['submit'])) {
                $name = htmlspecialchars($_POST['name']);
                $password = htmlspecialchars($_POST['password']);

                $errors = false;

                if (!Admin::checkName($name)) {
                    $errors[] = 'Поля имя  должно быть от 2 до 30 символов!';
                }

                $AdminChecked = Admin::checkAdminData($name, md5($password));

                if ($AdminChecked == false) {
                    $errors[] = 'Неправильный логин или пароль!';
                } else {
                    Admin::auth($name);
                    header("Location: /");
                }
            }
        } else {
            header("Location: /");
        }

        require_once ROOT . '/views/admin/login.php';
        return true;
    }

    public function actionLogout() {
        unset($_SESSION['name']);
        header("Location: /");
    }

}
