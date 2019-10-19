<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="">
        <meta name="description" content="менеджер задач онлайн,менеджер задач бесплатный">
        <meta name="author" content="Anushavan Mesrobyan">

        <title>Менеджер задач</title>

        <!-- Bootstrap core CSS -->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom style -->
        <link href="/public/css/style.css" rel="stylesheet">

    </head>   
    <body>  

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse   nav_background navbar-fixed-top ">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Менеджер задач</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php if (!Router::getURI()) echo "active"; ?>"><a href="/">Главный</a></li>

                                <?php if (Admin::isGuest()) : ?>
                                    <li class="<?php if (!Router::getURI()) echo "active"; ?>">
                                        <a href="/admin/login">
                                                <b>Вход в админку</b>
                                        </a>
                                    </li>
                                <?php else : ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                                Привет  <strong><?php echo $_SESSION['name'] ?></strong>

                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                    <a href='/admin/logout'>Выйти</a>

                                            </li>
                                        </ul>
                                    </li>
                                <?php endif; ?>


                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <br>