<!DOCTYPE html>
<html>
<head>
    <title>Тестовое задание для </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.js"></script>


<?= $content ?>
<?php
if ($logged) {
    ?>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">Реализация CRUD</a>
            <ul class="nav">
                <li class="active"><a href="/">На главную</a></li>

                <li><a href=/logout>выйти</a></li>
            </ul>
        </div>
    </div>
<?php }  var_export($_SERVER); ?>
</body>
</html>