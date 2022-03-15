<?php
require("../php/connect.php");
require("../php/general_functions.php");
$path_js = "../js/main.js";
$path_css = "../css/main.css";
$path_to_admin = "../admin/";
$title = "ФРБ по Свердловской области";
include '../php/blocks/head.php'
?>

<body>
    <?php
    $path_login = '../login.php';
    $path_to_index = '../index.php';
    $path_login = '../login.php';
    $path_logout = '../php/auth/logout.php';
    include '../php/blocks/header.php'
    ?> 
    <div class="body__title">
        Все видео:
    </div>
    <div class="body__video-container">
        <div class="video-container__block-content">
            <header class="block-content__header">
                <i class="header__icon fas fa-film"></i>
                Недавно опубликованные
            </header>
            <div class="block-content__container">
                <?php
                $all_materials = $connect->query("SELECT * FROM `materials`")->fetch_all();
                for ($i = 0; $i < count($all_materials); $i++) {
                    if (strlen($all_materials[$i][0]) > 0 and $all_materials[$i][3]) {
                        $first_file = explode(' ', $all_materials[$i][0])[0];
                        $first_file_ext = explode('.', $first_file)[1];
                        $video_types_array = array("webm", 'vid', 'mp4', 'mpeg');
                        $id = $all_materials[$i][5];
                        $link_to_post = "post.php?id=$id";

                        if (in_array($first_file_ext, $video_types_array)) {
                            echo '
                            <a href="'.$link_to_post.'" class="container__video-container">
                                <video class="video-container__preview" src="./materials/' . $all_materials[$i][5] . '/' . $first_file . '" alt=""></video>
                                <p class="video-container__title">' . $all_materials[$i][2] . '</p>
                                <p class="video-container__description">' . $all_materials[$i][1] . '</p>
                                <p class="video-container__date">' . $all_materials[$i][4] . '</p>
                            </a>
                            ';
                        } else {
                            echo '
                            <a href="'.$link_to_post.'" class="container__video-container">
                                <img height="145" class="video-container__preview" src="./materials/' . $all_materials[$i][5] . '/' . $first_file . '" alt="">
                                <p class="video-container__title">' . $all_materials[$i][2] . '</p>
                                <p class="video-container__description">' . $all_materials[$i][1] . '</p>
                                <p class="video-container__date">' . $all_materials[$i][4] . '</p>
                            </a>
                            ';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer__info-block footer__contacts">
            <header class="info-block__header">
                Контакты
            </header>
            <div class="info-block__content">
                <div class="content__text-content">
                    <p class="text-content__text">
                        <i class="text__icon fas fa-map-marker-alt"></i>
                        «Динамо»; г. Екатеринбург; ул. Еремина, 12
                    </p>
                    <p class="text-content__text">
                        <i class="text__icon fas fa-phone-alt"></i>
                        <a class="text__link" href="tel:+79122041146">+7 912 204-11-46</a>
                    </p>
                    <p class="text-content__text">
                        <i class="text__icon far fa-envelope"></i>
                        Адрес электронной почты
                    </p>
                </div>

            </div>
        </div>
    </footer>
</body>

</html>