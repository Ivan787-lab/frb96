<?php
require("../php/connect.php");
require("../php/general_functions.php");
$path_js = "./js/leaveReaction.js";
$path_css = "../css/main.css";
$path_to_admin = "../admin/";
$title = "ФРБ по Свердловской области";
include '../php/blocks/head.php';
$id = $_GET["id"];
require("../php/post/info_action/show_view.php");

?>

<body>
    <?php
    $id_of_admins = $connect->query("SELECT `id` FROM `admins`")->fetch_all();
    $check_is_admin = false;
    for ($i = 0; $i < count($id_of_admins); $i++) {
        if ($id_of_admins[$i][0] == $_COOKIE["id"]) {
            $check_is_admin = true;
            break;
        } else {
            $check_is_admin = false;
        }

        if ($id_of_admins[$i][2] == "Главный администратор") {
            $check_is_main_admin = true;
        }
    }
    ?>
    <header class="body__post-header">
        <div class="post-header__title">
            <a href="../">
                <img class="title__img" src="./img/frb-logo-small.png" alt="логотип ФРБ">
            </a>
            <div class="post-header__links">
                <?php
                $path_login = '../login.php';
                $path_to_index = '../index.php';
                $path_login = '../login.php';
                $path_logout = '../php/auth/logout.php';

                ?>
                <?php
                $all_admins_id = array();
                $all_admins_id_sql = $connect->query("SELECT `id` FROM `admins`")->fetch_all();
                for ($i = 0; $i < count($all_admins_id_sql); $i++) {
                    array_push($all_admins_id, $all_admins_id_sql[$i][0]);
                }
                if (in_array($_COOKIE["id"], $all_admins_id)) {
                    echo '<a href="' . $path_logout . '" class="links__link">Выйти из системы</a>';
                    echo ' <a href="' . $path_to_admin . '" class="links__link">Панель администратора</a>';
                } else {
                    echo '<a href="' . $path_login . '" class="links__link">Войти в систему</a>';
                }
                ?>

                <a target="_blank" href="https://vk.com/frb_sverdlovskoyoblasti" class="links__link"><i class="fab fa-vk"></i></a>
            </div>
        </div>

    </header>
    <div class="body__publication-container">
        <div class="publication-container__publication-body">
            <div class="publication-body__materials-container publication-body__publication-block">
                <?php
                $materials_array = scandir("materials/$id/", 1);

                for ($i = 0; $i < count($materials_array) - 2; $i++) {
                    $file_ext = explode('.', $materials_array[$i])[1];
                    $video_types_array = array("webm", 'vid', 'mp4', 'mpeg');

                    if (in_array($file_ext, $video_types_array)) {
                        echo '
                            <video id="my-video" class="video-js materials-container__video" controls preload="auto" data-setup="{}">
                                <source src="./materials/' . $id . '/' . $materials_array[$i] . '" type="video/mp4" />
                            </video> 
                                ';
                    } else {
                        echo '
                        <img class=" materials-container__image" src="./materials/' . $id . '/' . $materials_array[$i] . '" alt="">
                        ';
                    }
                }

                ?>
            </div>
            <div class="publication-body__publication-info publication-body__publication-block">
                <div class="publication-info__uploaded-user-container">
                    <img class="uploaded-user-container__image" src="../admin/img/user-photos/empty.jpg" alt="">
                    <?php
                    $uploaded_username = $connect->query("SELECT `uploaded_user` FROM `materials` WHERE `id` = '$id'")->fetch_assoc()["uploaded_user"];
                    ?>
                    <a href="#" class="uploaded-user-container__username"><?= $uploaded_username ?></a>
                </div>
                <div class="publication-info__publication-statistics">
                    <div class="publication-statistics__publication-name">
                        <?= $connect->query("SELECT `title` FROM `materials` WHERE `id` = '$id'")->fetch_assoc()["title"]; ?>

                    </div>
                    <div class="publication-statistics__publication-property-container">
                        <div class="publication-property-container__first-info-container">
                            <p class="first-info-container__property">
                                <i class="property__icon far fa-clock"></i>
                                <?= $connect->query("SELECT `date` FROM `materials` WHERE `id` = '$id'")->fetch_assoc()["date"]; ?>
                            </p>
                            <p class="first-info-container__property">
                                <i class="property__icon fas fa-eye"></i>
                                <?= show_view($_GET["id"]) ?>
                            </p>
                            <form id="like-form" action="" class=" publication-property-container__publication-action-form_grey">
                                <i class="publication-action-form__icon fas fa-thumbs-up"></i>
                                <input type="hidden" value="<?= $id ?>" name="id">
                                <span id="like-span">
                                    <?= $connect->query("SELECT `likes` FROM `post_actions` WHERE `id` = '$id'")->fetch_assoc()["likes"]; ?>
                                </span>
                            </form>

                        </div>
                        <p class="publication-property-container__quantity-comments">
                            <i class="quantity-comments__icon fas fa-comment"></i>
                            <?php
                            $comments_q = $connect->query("SELECT * FROM `comments` WHERE `post_id` = '$id'")->fetch_all();
                            ?>
                            <span id="comments-q"><?= count($comments_q) ?></span>
                        </p>
                    </div>
                    <div class="publication-statistics__publication-comments-container">
                        <h2 class="publication-comments-container__title">Комментарии: </h2>
                        <?php
                        $all_comments = $connect->query("SELECT * FROM `comments` WHERE `post_id` = '$id' ORDER BY `date` DESC")->fetch_all();
                        if (count($all_comments) > 0) {
                            for ($i = 0; $i < count($all_comments); $i++) {
                                echo '<div id="' . $all_comments[$i][4] . '" class="publication-comments-container__comment">';
                                echo '<p class="comment__name">' . $all_comments[$i][0] . '</p>';
                                echo '<xmp class="comment__text">' . $all_comments[$i][1] . '</xmp>';
                                echo '<form class=" publication-comments-container__comment-action-form" action="../php/post/comments_action/send_lawsuit.php" method="POST" id="'.$all_comments[$i][4].'">';
                                echo '<button class="comment-action-form__button-send-lawsuit">';
                                echo 'Отправить жалобу';
                                echo '</button>';
                                echo '<input type="hidden" name="comment_id" value="'.$all_comments[$i][4].'"/>';
                                echo '<input type="hidden" name="post_id" value="'.$all_comments[$i][5].'"/>';
                                echo '</form>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="publication-body__publication-description publication-body__publication-block">
                <h2 class="publication-description__title">Описание</h2>
                <xmp class="publication-description__textarea"><?php echo $connect->query("SELECT `text` FROM `materials` WHERE `id` = '$id'")->fetch_assoc()["text"]; ?></xmp>
            </div>
            <div class="publication-body__write-comment-container publication-body__publication-block">
                <h2 class="write-comment-container__title">Добавить комментарий</h2>
                <p class="write-comment-container__hint-text">Ваш email не будет опубликован. Обязательные поля для заполнения помечены <i class="hint-text__icon fas fa-star-of-life"></i></p>
                <form id="write-comment" class="write-comment-action__write-comment-form" action="" method="POST">
                    <div class="write-comment-form__input-container">
                        <label for="textarea">
                            <p class="label__hint-text">Комментарий <i class="hint-text__icon fas fa-star-of-life"></i></p>
                        </label>
                        <textarea name="text" required class="input-container__textarea" id="textarea"></textarea>
                    </div>
                    <div class="write-comment-form__input-container">
                        <label for="name">
                            <p class="label__hint-text">Имя <i class="hint-text__icon fas fa-star-of-life"></i></p>
                        </label>
                        <input name="name" required id="name" class="input-container_input" type="text">
                    </div>
                    <div class="write-comment-form__input-container">
                        <label for="email">
                            <p class="label__hint-text">E-mail <i class="hint-text__icon fas fa-star-of-life"></i></p>
                        </label>
                        <input name="email" required id="email" class="input-container_input" type="email">
                    </div>
                    <input value="<?= $id ?>" type="hidden" name="post_id">
                    <button class="write-comment-form__send-comment">Отправить комментарий</button>
                </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
    <script src="./js/writeComment.js"></script>
</body>

</html>