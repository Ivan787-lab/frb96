<?php
$path_js = "./js/main.js";
$path_css = "./css/main.css";
$path_to_admin = "admin/";
$title = "ФРБ по Свердловской области";
include 'php/blocks/head.php'
?>

<body>
    <?php
    $path_login = './login.php';
    $path_to_index = './index.php';
    $path_login = './login.php';
    $path_logout = 'php/auth/logout.php';
    require './php/connect.php';
    require './php/general_functions.php';
    include 'php/blocks/header.php'
    ?>
    <main>
        <div class="main__info-block">
            <div class="info-block__container">
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-info-circle"></i>
                        <h2 class="text-block__text">О Федерации</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-home"></i>
                        <h2 class="text-block__text">Отделения</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-calendar-week"></i>
                        <h2 class="text-block__text">Календарь событий</h2>
                    </div>
                </a>
                <a href="./materials/index.php" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-video"></i>
                        <h2 class="text-block__text">Видео и фото</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-user-friends"></i>
                        <h2 class="text-block__text">Попечительский совет</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-book"></i>
                        <h2 class="text-block__text">История</h2>
                    </div>
                </a>
            </div>
            <div class="info-block__container">
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-memory"></i>
                        <h2 class="text-block__text">Память</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-folder-open"></i>
                        <h2 class="text-block__text">Документы</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-address-card"></i>
                        <h2 class="text-block__text">МСМК, МК</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-trophy"></i>
                        <h2 class="text-block__text">Доблесть Федерации</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-hard-hat"></i>
                        <h2 class="text-block__text">Экипировка и снаряжение</h2>
                    </div>
                </a>
                <a href="#" class="info-block__link">
                    <div class="link__text-block">
                        <i class="text-block__icon fas fa-brain"></i>
                        <h2 class="text-block__text">Антидопинг</h2>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer__info-block footer__contacts">
            <header class="info-block__header">
                Контакты
            </header>
            <div class="info-block__content">
                <div class="content__text-content">
                    <p class="text-content__text">
                        <i class="text__icon fas fa-map-marker-alt"></i> «Динамо»; г. Екатеринбург; ул. Еремина, 12
                    </p>
                    <p class="text-content__text">
                        <i class="text__icon fas fa-phone-alt"></i>
                        <a class="text__link" href="tel:+79122041146">+7 912 204-11-46</a>
                    </p>
                    <p class="text-content__text">
                        <i class="text__icon far fa-envelope"></i> Адрес электронной почты
                    </p>
                </div>

            </div>
        </div>
    </footer>

</body>

</html>