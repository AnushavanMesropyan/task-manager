<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="container theme-showcase" role="main">
        <div class="page-header"><h1>Задача номер <?php echo $taskItem['id'] ?></h1></div>
        <p>
            <a href='/task/add' class="btn btn-primary" role="button">Добавить задачу</a>
            <?php if (!User::isGuest()) : ?>
                <a href='/task/edit/<?php echo $taskItem["id"] ?>' class="btn btn-warning" role="button">Редактировать задачу</a>
            <?php endif; ?>

        </p>
        <p>
            <strong>Имя пользователя: </strong><?php echo $taskItem['user_name'] ?>
        </p>
        <p>
            <strong>Адрес эл. почты: </strong><?php echo $taskItem['email'] ?>
        </p>
        <p>
            <strong>Статус: </strong><?php
            if ($taskItem['status']) {
                echo "Completed";
            } else {
                echo "New";
            }
            ?>
        </p>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>