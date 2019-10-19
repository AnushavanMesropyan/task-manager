<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h1>Список задач</h1></div>
    <p><a href='/task/add' class="btn btn-primary" role="button">Добавить задачу</a></p>
    <form class="form-inline" action="/" method="post">
        <div class="form-group">
            <label>Сортировать по:</label>
            <select class="form-control" name="sortField">
                <option value="0" <?php if ($_SESSION['sort_field'] == 0) echo 'selected="selected"'; ?>>Id</option>
                <option value="1" <?php if ($_SESSION['sort_field'] == 1) echo 'selected="selected"'; ?>>имени</option>
                <option value="2" <?php if ($_SESSION['sort_field'] == 2) echo 'selected="selected"'; ?>>мейлу</option>
                <option value="3" <?php if ($_SESSION['sort_field'] == 3) echo 'selected="selected"'; ?>>статусу</option>
            </select>
        </div>
        <div class="form-group">
            <label>Тип:</label>
            <select class="form-control" name="sortOrganize">
                <option value="1" <?php if ($_SESSION['sort_organize'] == 1) echo 'selected="selected"'; ?>>по возрастанию</option>
                <option value="2" <?php if ($_SESSION['sort_organize'] == 2) echo 'selected="selected"'; ?>> по уменьшению</option>
            </select> 
            <input class="btn btn-default" type="submit" name="submit" value="Сортировать">
        </div>
    </form>        
    <table class="table table-striped">
        <thead>       
            <tr>
                <td>Id</td>
                <td>Имя пользователя</td>
                <td>Адрес эл. почты</td>
                <td>Текст задачи</td>
                <td>Статус задачи</td>
                <td></td>
                <?php if (!Admin::isGuest()) : ?>
                    <td></td>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if($taskList):?>
            <?php foreach ($taskList as $taskItem) : ?>
                <tr class="<?php if ($taskItem['status']) echo 'success'; ?>">
                    <td><?php echo $taskItem['id'] ?></td>
                    <td><?php echo $taskItem['Admin_name'] ?></td>
                    <td><?php echo $taskItem['email'] ?></td>
                    <td><?php echo $taskItem['text'] ?></td>
                    <td>
                        <?php
                        if ($taskItem['status'])
                            echo "Выполнено";
                        else
                            echo "Новый";
                        ?>
                    </td>
                    <td>
                        <a href="/task/<?php echo $taskItem['id'] ?>" class="btn btn-info" role="button">Посмотреть</a>
                    </td>
                    <?php if (!Admin::isGuest()) : ?>
                        <td>
                                <a href="/task/edit/<?php echo $taskItem['id'] ?>" class="btn btn-warning" role="button">Редактировать</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <p><?php echo $pagination->get(); ?></p>
</div>   

<?php include ROOT . '/views/layouts/footer.php'; ?>