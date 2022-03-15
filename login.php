<?php
$path_js = "./js/main.js";
$path_css = "./css/main.css";
$title = "Вход в систему";
include 'php/blocks/head.php'
?>

<body>
    <?php
    $path_login = './login.php';
    $path_to_index = './index.php';
    $path_login = 'php/auth/login.php';
    $path_logout = 'php/auth/logout.php';
    require './php/connect.php';
    require './php/general_functions.php';

    include 'php/blocks/header.php'
    ?>
    <div class="body__login-container">
        <form action="php/auth/login.php" method="POST" class="login-container__form">
            <p class="form__title">Войти в систему</p>
            <input placeholder="Ваше имя" name="name" type="text" class="form__input">
            <input placeholder="Пароль" name="password" type="password" class="form__input">
            <button class="form__button">Войти в систему</button>
        </form>
    </div>
</body>