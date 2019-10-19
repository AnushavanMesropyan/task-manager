<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase container text-center">
    <div class="page-header "><h1>Вход</h1></div>
    <?php if ($errors) : ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form class="form-horizontal container" action="#" method="post">
        <div class="form-group">
            <div class="col-sm-push-3 col-sm-6">
                <input type="text" placeholder="Логин" name="name" class="form-control">
            </div>
        </div>
        <div class="form-group ">
            <div class="col-sm-push-3 col-sm-6">

                <input type="password" placeholder="Пароль" name="password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-push-3 col-sm-6 text-center ">
                <input type="submit" name="submit" value="Войти" class="btn btn-primary btn-lg btn-block">
            </div>
        </div>
    </form>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>


