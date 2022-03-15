<?php
require '../php/connect.php';
require '../php/general_functions.php';
$path_js = "../js/main.js";
$path_css = "../css/main.css";
$path_to_admin = "admin/";
$title = "Изменение всех публикаций";
include '../php/blocks/head.php';
require '../php/admin/check_is_admin.php';
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
        <div class="admin-container__materials-container">
            <?php
            require '../php/connect.php';
            $all_materials = $connect->query("SELECT * FROM `materials`")->fetch_all();

            if (count($all_materials) > 0) {
                for ($i = 0; $i < count($all_materials); $i++) {

                    if (strlen($all_materials[$i][0]) > 0 and $all_materials[$i][3]) {
                        $first_file = explode(' ', $all_materials[$i][0])[0];
                        $first_file_ext = explode('.', $first_file)[1];
                        $video_types_array = array("webm", 'vid', 'mp4', 'mpeg');
                        $id = $all_materials[$i][5];
                        $link_to_post = "edit_post.php?id=$id";

                        if (in_array($first_file_ext, $video_types_array)) {
                            echo '
                            <a href="' . $link_to_post . '" class="materials-container__material">
                                <video class="material__preview" src="../materials/materials/' . $id . '/' . $first_file . '" alt=""></video>
                                <p class="material__title">' . $all_materials[$i][2] . '</p>
                                <p class="material__date">' . $all_materials[$i][4] . '</p>
                                <i class="material__icon-edit fas fa-pen-square"></i>
                                <form class="material__delete-form" action="../php/admin/edit_post_action/delete_material.php" method="POST">
                                <input name="id" type="hidden" value="'.$id.'"/>
                                    <button class="delete-form__delete-button">Удалить</button>
                                </form>
                            </a>
                            ';
                        } else {
                            echo '
                                <a href="' . $link_to_post . '" class="materials-container__material">
                                    <img height="145" class="material__preview" src="../materials/materials/' . $id . '/' . $first_file . '" alt="">
                                    <p class="material__title">' . $all_materials[$i][1] . '</p>
                                    <p class="material__date">' . $all_materials[$i][4] . '</p>
                                    <i class="material__icon-edit fas fa-pen-square"></i>
                                    <form class="material__delete-form" action="../php/admin/edit_post_action/delete_material.php" method="POST">
                                    <input name="id" type="hidden" value="'.$id.'"/>
                                        <button class="delete-form__delete-button">Удалить</button>
                                    </form>
                                </a>
                                ';
                        }
                    } 
                }
            } else {
                echo '<h2 class="materials-container__title">Здесь нечего редактировать</h2>';
            }

            $connect->close();
            ?>
        </div>
    </div>
    <?endif?>
</body>

</html>