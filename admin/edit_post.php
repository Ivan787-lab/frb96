<?php
require '../php/connect.php';
require '../php/general_functions.php';
$path_js = "./js/edit_post.js";
$path_css = "../css/main.css";
$title = "Редактирование публикации";
include '../php/blocks/head.php';
require '../php/admin/check_is_admin.php';

$id = $_COOKIE["id"];
$page_id = $_GET["id"];

$connect->query("INSERT INTO `materials` (`status`,`id`) VALUES('0','$page_id')");
$uploaded_user = $connect->query("SELECT `name` FROM `admins` WHERE `id` = '$id'")->fetch_assoc()["name"];
?>

<body>

    <header class="body__admin-header">
        <?php
        require '../php/blocks/admin_header.php';
        ?>
    </header>
    <?php if (check_is_admin()) : ?>
        <div class="body__admin-container">
            <?php
            require '../php/blocks/sidebar.php';
            ?>
            <div class="admin-container__workspace">
                <div class="workspace__make-video-container">
                    <div class="workspace__upload-video-container">
                        <form id="upload-video" class="upload-video-container__upload-video-form" enctype="multipart/form-data" action="../php/admin/material_action/upload.php" method="POST">
                            <input name="materials[]" accept="image/*,video/*" multiple class="upload-video-form__input-file" type="file">
                            <input value="<?= $page_id ?>" type="hidden" name="id">
                            <button class="upload-video-form__button">Добавить</button>
                        </form>
                    </div>
                    <div class="workspace__add-text-for-video">
                        <form class="add-text-for-video__add-text-form" action="../php/admin/material_action/upload.php" method="POST">
                            <input value="<?= $page_id ?>" type="hidden" name="id">

                            <div class="add-text-form__input-container">
                                <label for="video-name">
                                    <p class="add-text-form__hint">Написать название публикации</p>
                                </label>
                                <?php
                                $video_name = $connect->query("SELECT `video_name` FROM `materials` WHERE `id` = '$page_id'")->fetch_assoc()['video_name'];
                                ?>
                                <input required value="<?= $video_name ?>" name="video-name" id="video-name" type="text" class="add-text-form__textarea" />
                            </div>

                            <div class="add-text-form__input-container">
                                <label for="textarea">
                                    <p class="add-text-form__hint">Написать текст для публикации</p>
                                </label>
                                <?php
                                $video_text = $connect->query("SELECT `text` FROM `materials` WHERE `id` = '$page_id'")->fetch_assoc()['text'];
                                ?>
                                <textarea required name="text" id="textarea" rows="8.5" class="add-text-form__textarea"><?= $video_text ?></textarea>
                            </div>

                            <button class="add-text-form__button">Добавить</button>
                        </form>
                    </div>
                </div>
                <div class="workspace__video-settings">
                    <div class="video-settings-container__info-about-materials">
                        <header class="info-about-materials__title">Общая информация о материалах</header>
                        <div class="info-about-materials__materials-container">
                            <?php
                            $materials_in_publication_string = $connect->query("SELECT `material` FROM `materials` WHERE `id` = '$page_id'")->fetch_all();
                            $materials_in_publication_array = explode(" ", $materials_in_publication_string[0][0]);
                            $video_types_array = array("webm", 'vid', 'mp4', 'mpeg');
                            $full_info_about_materials = $connect->query("SELECT * FROM `materials` WHERE `id` = '$page_id'")->fetch_all();
                            for ($i = 0; $i < count($materials_in_publication_array) - 1; $i++) {
                                $filename = $materials_in_publication_array[$i];
                                $file_ext = explode(".", $filename)[1];
                                $date = date("d.m.y", stat("../materials/materials/$page_id/$filename")["mtime"]);
                                $size = number_format(stat("../materials/materials/$page_id/$filename")["size"] / 1048576, 2) . ' МБ';
                                echo '<div class="materials-container__info-about-material">';
                                if (in_array($file_ext, $video_types_array)) {
                                    echo '<video class="info-about-material__preview" src="../materials/materials/' . $page_id . '/' . $filename . '"></video>';
                                } else {
                                    echo '<img class="info-about-material__preview" src="../materials/materials/' . $page_id . '/' . $filename . '"/>';
                                }
                                echo '<div class="info-about-material__general-specifications">';
                                echo '<p class="general-specifications__name-of-video">' . $filename . '</p>';
                                echo '<p class="general-specifications__date-of-video">' . $date . '</p>';
                                echo '<p class="general-specifications__size-of-video">' . $size . '</p>';
                                echo '</div>';
                                echo '<form method="POST" action="#" class="info-about-material__status-of-material">';
                                echo '<svg class="status-of-material__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg>';
                                echo '<input type="hidden" name="id" value="'.$page_id.'"/>';
                                echo '<input type="hidden" name="filename" value="'.$filename.'"/>';
                                echo '</form>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="video-settings-container__upload-container">
                        <header class="upload-container__title">Публикация материалов</header>
                        <div class="upload-container__container-forms">
                            <form class="container-forms__upload-video-form" action="../php/admin/material_action/confirm_download.php" method="POST">
                                <input name="id" value="<?= $page_id ?>" type="hidden">
                                <?php
                                $name = $connect->query("SELECT `name` FROM `admins` WHERE `id` = '$id'")->fetch_all()[0][0];
                                ?>
                                <input name="uploaded_user" value="<?= $name ?>" type="hidden">
                                <button class="upload-video-form__button">Опубликовать на сайт</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</body>

</html>
<?php
$connect->close();
?>