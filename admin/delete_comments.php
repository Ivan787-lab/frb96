<?php
require '../php/connect.php';
require '../php/general_functions.php';
$path_js = "./js/admin_panel.js";
$path_css = "../css/main.css";
$path_to_admin = "admin/";
$title = "Удаление комментариев";
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
            <div class="body__admin-container">
                <div class="admin-container__comments-container">
                    <?php
                    $controversial_comments = $connect->query("SELECT * FROM `lawsuits`")->fetch_all();
                    for ($i = 0; $i < count($controversial_comments); $i++) {
                        $comment_id = $controversial_comments[$i][0];
                        $post_id = $controversial_comments[$i][1];
                        $lawsuit_id = $controversial_comments[$i][2];
                        $comment_text = $connect->query("SELECT `text` FROM `comments` WHERE `id` = '$comment_id'")->fetch_assoc()["text"];
                        $comment_author = $connect->query("SELECT `title` FROM `comments` WHERE `id` = '$comment_id'")->fetch_assoc()["title"];
                        $author_email = $connect->query("SELECT `email` FROM `comments` WHERE `id` = '$comment_id'")->fetch_assoc()["email"];
                        
                        echo '<div class="comments-container__comment">';
                        echo '<div class="comment__quote-container">';
                        echo $comment_text;
                        echo ' </div>';
                        echo '<div class="comment__author-info-container">';
                        echo '<p class="author-info-container__info">Автор: <br> <b>' . $comment_author . '</b></p>';
                        echo '<p class="author-info-container__info">Email: <br> <b>' . $author_email . '</b></p>';
                        echo '<p class="author-info-container__info">Ссылка на комментарий: ';
                        echo '<a target="_blank" href="https://frb96.com/materials/post.php?id=' . $post_id . '#'.$comment_id.'">';
                        echo '<b>https://frb96.com/materials/post.php?id=' . $post_id . '#'.$comment_id.'</b>';
                        echo '</a>';
                        echo '</p>';
                        echo '</div>';
                        echo '<div class="comment__forms-container">';
                        echo ' <form action="../php/post/comments_action/reject_lawsuit.php " method="POST" class="form-container__form form-container__form_reject">';
                        echo '<button class="form__button form__reject-button">Отклонить</button>';
                        echo '<input name="comment_id" type="hidden" value="' . $comment_id . '"/>';
                        echo '<input name="post_id" type="hidden" value="' . $post_id . '"/>';
                        echo '</form>';
                        echo '<form action="../php/post/comments_action/delete_comment.php" class="form-container__form form-container__form_delete" method="POST">';
                        echo '<button class="form__button form__delete-button">Удалить</button>';
                        echo '<input name="comment_id" type="hidden" value="' . $comment_id . '"/>';
                        echo '<input name="post_id" type="hidden" value="' . $post_id . '"/>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</body>

</html>
<?php
$connect->close();
?>