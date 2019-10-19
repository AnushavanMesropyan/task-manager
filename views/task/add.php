<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container theme-showcase" role="main">   
    <div class="page-header"><h1>Добавить задачу</h1></div>
    <?php if ($errors) : ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <p>
        <a href='/' class="btn btn-primary" role="button">Главный</a>
    </p>
    <?php if ($result): ?>
        <div class="alert alert-success" role="alert">
            <p>Задача успешно добавлено!</p>
        </div>
    <?php else : ?>
        <div class="container">

            <form class="form-horizontal container" action="#" method="post"   id="form1" >

                <fieldset class="form-group text-center">
                    <legend>Добавить задачу</legend>
                    <div class="form-group">
                        <div class=" col-sm-6">
                            <label class=" sr-only" for="name">Имя</label>
                            <input type="text" placeholder="Имя" name="name" value="<?php echo $name ?>" class="form-control form_control_fields" id="name">
                        </div><!-- form-group -->

                        <div class="col-sm-6">
                            <label class=" sr-only" for="email">E-mail</label>
                            <input type="email" placeholder="E-mail" name="email" value="<?php echo $email ?>" class="form-control" id="email">
                        </div><!-- form-group -->
                    </div><!-- form-group -->


                    <div class="form-group form-group-lg">
                        <div class="col-sm-12">
                            <textarea class="form-control" name="text" id="reasonforvisit" rows="3" placeholder="Текст задачи"></textarea>
                        </div>
                    </div><!-- form-group -->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" name="submit" type="submit">Добавить</button>
                        </div><!-- offset col -->
                    </div><!-- form-group -->

            </form>
        </div>
    <?php endif; ?>

</div> 

<?php include ROOT . '/views/layouts/footer.php'; ?>