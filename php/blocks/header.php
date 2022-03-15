<header class="body__header">
    <div class="header__logo">
        <a href="<?= $path_to_index ?>">
            <img class="logo__img" src="img/frb-logo.png" alt="логотип ФРБ">
        </a>
        <h1 class="logo__title">РЕГИОНАЛЬНАЯ ОБЩЕСТВЕННАЯ ОРГАНИЗАЦИЯ «ФЕДЕРАЦИЯ РУКОПАШНОГО БОЯ СВЕРДЛОВСКОЙ ОБЛАСТИ»</h1>
    </div>
    <div class="header__links">
        <?php
            $all_admins_id = array();
            $all_admins_id_sql = $connect->query("SELECT `id` FROM `admins`")->fetch_all();
            for ($i=0; $i < count($all_admins_id_sql); $i++) { 
                array_push($all_admins_id,$all_admins_id_sql[$i][0]);
            }
            if (in_array($_COOKIE["id"],$all_admins_id)) {
                echo '<form method="POST" action="'.$path_logout.'">';
                echo '<button href="#" class="links__link">Выйти из системы</button>';
                echo '<input type="hidden" name="user_id" value="'.$_COOKIE["id"].'"/>';
                echo '</form>';
                echo ' <a href="'.$path_to_admin.'" class="links__link">Панель администратора</a>';
            } else {
                echo '<a href="'.$path_login.'" class="links__link">Войти в систему</a>';
            }
        ?>
        <a target="_blank" href="https://vk.com/frb_sverdlovskoyoblasti" class="links__link"><i class="fab fa-vk"></i></a>
        <a target="_blank" href="https://www.instagram.com/frb_sverdlovsk_region_96/" class="links__link"><i class="fab fa-instagram"></i></a>
    </div>
</header>