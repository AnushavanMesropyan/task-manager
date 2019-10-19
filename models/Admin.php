<?php

class Admin {

    public static function checkAdminData($name, $password) {
        $db = Db::getConnection();
        $query = "SELECT *
                    FROM `admin`
                    WHERE name='".$name." '
                      AND password='".$password."'";
        $result = $db->query($query);
        if ($result->fetch()) {
            return true;
        }
        return false;
    }

    public static function auth($name) {

        $_SESSION['name'] = $name;
        $_SESSION['sort_field'] = 0;
        $_SESSION['sort_organize'] = 1;
    }

    public static function checkAuth() {

        if (isset($_SESSION['name'])) {
            return true;
        }

        header("Location: /admin/login");
        return false;
    }

    public static function isGuest() {

        if (isset($_SESSION['name'])) {
            return false;
        }

        return true;
    }

    public static function checkName($name) {

        if (strlen($name) >= 2 && strlen($name) <= 30) {
            return true;
        }

        return false;
    }

}
