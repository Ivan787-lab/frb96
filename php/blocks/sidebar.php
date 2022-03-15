<div class="admin-container__sidebar">
    <div class="sidebar__profile-container">
        <img src="./img/user-photos/empty.jpg" alt="фотография администратора" class="profile-container__user-photo">
        <?php
        $id = $_COOKIE["id"];
        $name = $connect->query("SELECT `name` FROM `admins` WHERE `id` = '$id'")->fetch_all()[0][0];
        $role = $connect->query("SELECT `role` FROM `admins` WHERE `id` = '$id'")->fetch_all()[0][0];
        ?>
        <h2 class="profile-container__name"><?= $name ?></h2>
        <p class="profile-container__role"><?= $role ?></p>
    </div>
    <div class="sidebar__container-tools">
        <?php
        $id = mt_rand(100000000000, 999999999999);
        ?>
        <a href="./faq.php" class="container-tools__link container-tools__link_active"><b>Инструкция по использованию</b></a>
        <a href="./" class="container-tools__link container-tools__link_active">Главная страница</a>
        <a href="./upload.php?id=<?= $id ?>" class="container-tools__link container-tools__link_active">Создание публикации</a>
        <a href="./edit.php" class="container-tools__link container-tools__link_active">Редактирование публикации</a>
        <a href="./delete_comments.php" class="container-tools__link container-tools__link_active">Удаление комментариев</a>
        <?php
            $notification_id = mt_rand(100000000000, 999999999999);
        ?>
        <a href="./create_notification.php?id=<?=$notification_id?>" class="container-tools__link container-tools__link_active">Создать объявление</a>

    </div>
</div>