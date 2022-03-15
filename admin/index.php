<?php
require '../php/connect.php';
require '../php/general_functions.php';
$path_js = "./js/admin_panel.js";
$path_css = "../css/main.css";
$path_to_admin = "admin/";
$title = "Административная панель";
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
            <div class="admin-container__main-container">
                <div class="main-container__administrator-accounts-container">
                    <header class="administrator-accounts-container__header">Учетные записи администраторов</header>
                    <table class="administrator-accounts-container__table">
                        <tbody>
                            <tr class="tbody__tr tbody__top-tr">
                                <td>Имя</td>
                                <td>Пароль</td>
                                <td>Роль</td>
                                <td>Идентификатор</td>
                                <td>Действия</td>
                            </tr>
                            <?php
                            $admins =  $connect->query("SELECT * FROM `admins`")->fetch_all();
                            for ($i = 0; $i < count($admins); $i++) {
                                echo '<tr class="tbody__tr body-of-table">';
                                echo ' <td>' . $admins[$i][0] . '</td>';
                                echo ' <td>' . $admins[$i][1] . '</td>';
                                echo ' <td>' . $admins[$i][2] . '</td>';
                                echo ' <td>' . $admins[$i][3] . '</td>';
                                echo '<td>
                                <form action="#" class="td__form" method="POST">
                                    <input name="id" type="hidden" value="' . $admins[$i][3] . '"/>
                                    <button class="form__button"><i class="fas fa-trash"></i></button>
                                </form>
                                </td>';
                                echo '</tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="main-container__unfinished-publications-container">
                    <header class="unfinished-publications-container__header">Вы не опубликовали:</header>
                    <div class="unfinished-publications-container__list">
                        <?php
                        $all_publications = $connect->query("SELECT * FROM `materials` WHERE `status` != '1'")->fetch_all();
                        for ($i = 0; $i < count($all_publications); $i++) {

                            $publication_id = $all_publications[$i][5];
                            $path = "./upload.php?id=$publication_id";
                            if ($all_publications[$i][1] != '') {
                                echo '<a href="' . $path . '" target="_blank" class="list__link">
                                    ' . $all_publications[$i][1] . '
                                </a>';
                            } else {
                                echo '<a href="' . $path . '" target="_blank" class="list__link">
                                    текст отсутсвует
                                </a>';
                            }
                        }
                        ?>
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