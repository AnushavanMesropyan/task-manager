<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="container theme-showcase" role="main">
        <div class="page-header"><h1>Задача номер<?php echo $taskItem['id'] ?></h1></div>
        <p>
            <a href='/task/add' class="btn btn-primary" role="button">Добавить задачу</a>
            <a href='/task/edit/<?php echo $taskItem["id"] ?>' class="btn btn-warning" role="button">Редактировать
                задачу</a>
        </p>
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">
                <p>Задача успешно обновлена!</p>
            </div>
        <?php else : ?>
            <div class="container">
                <p>
                    <strong>Имя пользователя: </strong><?php echo $taskItem['user_name'] ?>
                </p>
                <p>
                    <b>Адрес эл. почты: </b><?php echo $taskItem['email'] ?>
                </p>


                <form action="#" method="post" class="form-horizontal ">

                    <div class="form-group form-group-lg">
                        <div class="col-sm-12">

                            <label>Текст задачи:</label><br>
                            <textarea name="text" cols="40" rows="5" placeholder="Текст задачи"
                                      class="form-control"><?php echo $taskItem['text'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <div class="col-sm-12">

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status"
                                           value="1" <?php if ($taskItem['status']) echo "checked"; ?>>Выполнено
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <input type="submit" name="submit" value="Сохранить" class="btn btn-default">
                    </div>
            </div>


            </form>
        <?php endif; ?>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>