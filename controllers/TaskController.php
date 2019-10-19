<?php

class TaskController {

    public function actionIndex($page = 1, $sortField = 0, $sortOrganize = 1) {

        if (isset($_POST['submit'])) {
            $_SESSION['sort_field'] = intval($_POST['sortField']);
            $_SESSION['sort_organize'] = intval($_POST['sortOrganize']);
        }

        if (
                !isset($_SESSION['sort_field']) &&
                !isset($_SESSION['sort_organize'])
        ) {
            $_SESSION['sort_field'] = 0;
            $_SESSION['sort_organize'] = 1;
        }

        $taskList = Task::getTaskList($page, $_SESSION['sort_field'], $_SESSION['sort_organize']);
        $total = Task::getTotalTasks();
        $pagination = new Pagination($total, $page, Task::SHOW_DEFAULT, 'p');

        require_once(ROOT . '/views/task/index.php');
        return true;
    }

    public function actionView($id) {

        $taskItem = Task::getTaskItemById($id);

        require_once(ROOT . '/views/task/view.php');
        return true;
    }

    public function actionAdd() {
        if (isset($_POST['submit'])) {

            $errors = false;

            $name = htmlspecialchars($_POST['name']);
            $email = $_POST['email'];
            $text = htmlspecialchars($_POST['text']);
            if (!Admin::checkName($name)) {
                $errors[] = 'Поля имя  должно быть от 2 до 30 символов!';
            }

            if (!Task::checkEmail($email)) {
                    $errors[] = 'Формат емейл неверный!';
            }

            if ($text == '') {
                $errors[] = 'Поля текст обязательно!';
            }

            if ($errors == false) {
                $result = Task::add($name, $email, $text);
            }

        }

        require_once(ROOT . '/views/task/add.php');
        return true;
    }

    public function actionEdit($id) {

        Admin::checkAuth();

        $taskItem = Task::getTaskItemById($id);
        if (isset($_POST['submit'])) {
            if (isset($_POST['text'])) {
                $text = $_POST['text'];
            }
            if (isset($_POST['status'])) {
                $status = intval($_POST['status']);
            }

            $result = Task::edit($id, $text, $status);
        }

        require_once(ROOT . '/views/task/edit.php');
        return true;
    }

}
