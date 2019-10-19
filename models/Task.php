<?php

class Task {

    const SHOW_DEFAULT = 3;
    public static function getTaskList($page = 1, $sortField = 0, $sortOrganize = 1) {

        $sortField = intval($sortField);
        $sortOrganize = intval($sortOrganize);

        switch ($sortField) {
            case 0: $sortField = "id";
                break;
            case 1: $sortField = "user_name";
                break;
            case 2: $sortField = "email";
                break;
            case 3: $sortField = "status";
                break;
        }
        switch ($sortOrganize) {
            case 1: $sortOrganize = "ASC";
                break;
            case 2: $sortOrganize = "DESC";
                break;
        }

        $page = intval($page);
        $count = self::SHOW_DEFAULT;
        $offset = ($page - 1) * $count;

        $db = Db::getConnection();
        $query = "SELECT * "
                . "FROM task "
                . "ORDER BY $sortField $sortOrganize "
                . "LIMIT $count "
                . "OFFSET $offset";
        $result = $db->query($query);

        if ($result) {
            foreach ($result as $row) {
                $taskList[] = array(
                    'id' => $row['id'],
                    'user_name' => $row['user_name'],
                    'email' => $row['email'],
                    'text' => $row['text'],
                    'status' => $row['status'],
                );
            }
        }

        return $taskList;
    }

    public static function getTaskItemById($id) {

        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $query = "SELECT * "
                    . "FROM task "
                    . "WHERE id = " . $id;
            $result = $db->query($query);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $taskItem = $result->fetch();

            return $taskItem;
        }
    }

    public static function getTotalTasks() {

        $db = Db::getConnection();

        $query = "SELECT COUNT(id) AS count "
                . "FROM task";
        $result = $db->query($query);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function add($name, $email, $text) {

        $db = Db::getConnection();
        $text = self::checkResult($text);

        $query = "INSERT INTO task SET "
                . "user_name = :name, "
                . "email = :email, "
                . "text = :text";

        $result = $db->prepare($query);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function edit($id, $text, $status = 0) {

        $db = Db::getConnection();
        $text = self::checkResult($text);
        $query = "UPDATE task SET "
                . "text = :text, "
                . "status = :status "
                . "WHERE id = :id";

        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkEmail($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }
    public static function checkResult($param) {
        return htmlspecialchars($param);
    }


}
