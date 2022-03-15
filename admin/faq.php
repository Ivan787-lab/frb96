<?php
require '../php/connect.php';
require '../php/general_functions.php';
$path_js = "./js/upload.js";
$path_css = "../css/main.css";
$title = "Инструкция пользования";
include '../php/blocks/head.php';
require '../php/admin/check_is_admin.php';
?>

<body>
<?php if (check_is_admin()) : ?>
    <div class="body__admin-container">
        <div class="admin-container__faq-sidebar">
            <h1 id="main-title" class="faq-sidebar__main-title">Оглавление</h1>
            <div class="faq-sidebar__info-block">
                <a href="#introduction" class="info-block__title">&#8226;Введение</a>
            </div>
            <div class="faq-sidebar__info-block">
                <a href="#create-publication-title" class="info-block__title">&#8226;Создание публикации</a>
                <div class="info-block__list">
                    <a href="#upload-materials" class="list__title">&#8226;Загрузка материалов</a>
                    <a href="#upload-materials-change-size" class="list__title">&#8226;Изменение размеров материалов</a>
                    <a href="#upload-text" class="list__title">&#8226;Загрузка текста</a>
                    <a href="#info-about-materials" class="list__title">&#8226;Общая информация про материалы</a>
                </div>
            </div>
            <div class="faq-sidebar__info-block">
                <a href="#change-publication-title" class="info-block__title">&#8226;Редактирование публикации</h3>
                    <div class="info-block__list">
                        <a href="#change-materials" class="list__title">&#8226;Изменение материалов</a>
                        <a href="#change-text" class="list__title">&#8226;Изменение текста</a>
                        <a href="#change-info-about-materials" class="list__title">&#8226;Изменение общей информации</a>
                        <a href="#change-info-change-size" class="list__title">&#8226;Изменение размеров материалов</a>
                        <a href="#delete-publication" class="list__title">&#8226;Удаление публикации</a>
                    </div>
            </div>
            <div class="faq-sidebar__info-block">
                <a href="#work-with-comments-title" class="info-block__title">&#8226;Работа с комментариями</a>
                <div class="info-block__list">
                    <a href="#general-info-about-work-with-comments" class="list__title">&#8226;Общая информация</a>
                    <a href="#work-with-comments" class="list__title">&#8226;Удаление комментариев со стороны администратора</a>
                </div>
            </div>
            <div class="faq-sidebar__sidebar-footer">
                <a class="sidebar-footer__link" href="./">Вернуться на главную</a>
            </div>
        </div>
        <div class="admin-container__text-container">
            <div class="text-container__semantic-block">
                <div class="semantic-block__text-block">
                    <h3 id="introduction" class="text-block__title">Введение</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            Здесь будет содержаться информация и обучающая информация по использованию сайта.
                            Инструкция, с
                            появением новых функций на сайте, будет дополняться.
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-container__semantic-block">
                <div class="semantic-block__text-block">
                    <h2 id="create-publication-title" class="text-block__title">Создание публикации</h2>
                    <div class="text-block__container">
                        <div class="container__text">
                            В этом блоке будет подробно показано, как загружать материалы на сайт.
                        </div>
                    </div>
                </div>
                <div class="semantic-block__text-block">
                    <h3 id="upload-materials" class="text-block__title">Загрузка материалов</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            На видео пошагово показано, как загружать видео/фото на сайт.<br>
                            На сайт можно загружать одно либо несколько видео или фото, <b>однако</b> чем больше будет материалов, тем дольше будут обрабатываться запросы к серверу. <br>
                            <b>ВАЖНО!</b> Если нажать на форму и выбрать неоходимые материалы, однако не нажать на кнопку <span class="text__btn">Добавить</span> под формой и <b>закрыть или обновить страницу</b>, <b>МАТЕРИАЛЫ НЕ СОХРАНЯТСЯ</b>.
                        </div>
                        <img class="container__image" src="./materials/upload-video.gif" alt=""/>
                    </div>

                </div>
                <div class="semantic-block__text-block">
                    <h3 id="upload-materials-change-size" class="text-block__title">Изменение размеров материалов</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            Когда Вы загружаете видео публикации на сайт, из-за большого размера материала, оно может очень долго грузиться на сайте и еще дольше загружаться у пользователей с нестабильным интернет соединением. На видео показано, как изменять размер загружаемого материала. <br><b>Рекомендуется выбирать <span class="text__btn">Средний</span> размер, так как качество изображение ухудшается пренебрежимо мало, а загружается намного быстрее</b>
                        </div>
                        <img class="container__image" src="./materials/change-size.gif" alt=""/>
                    </div>
                </div>

                <div class="semantic-block__text-block">
                    <h3 id="upload-text" class="text-block__title">Загрузка текста</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            На видео пошагово показано, как писать название и описание для публикации на сайт.<br>
                            Здесь можно писать неограниченно много текста, так-как предельное количество текста для одной публикации составляет <b>1083621225 миллиардов символов</b>. <br>
                            В отличие от загрузки видео, текст сохраняется <b>автоматически</b>, <b>однако</b> он сохраняется <b>локально</b>, то есть только на этой странице, <b>в базу данных эти сохранения не вносятся.</b> <br> <b>Чтобы текст сохранился</b>, необходимо нажать кнопку <span class="text__btn">Добавить</span> под формой.
                        </div>
                        <img class="container__image" src="./materials/upload-text.gif" alt=""/>
                    </div>

                </div>
                <div class="semantic-block__text-block">
                    <h3 id="info-about-materials" class="text-block__title">Общая информация про материалы</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            Предположим, что Вы, загружая различные материалы, ошиблись и загрузили не то, что нужно. <br> Удалить это можно, нажав на кнопку мусорки, как показано на видео.<br>
                            Будьте внимательны! Материалы, которые Вы удалили, будут удалены <b>НАВСЕГДА</b>, вернуть их возможно только в том случае, если <b>сохранен первоначальный источник</b>.<br>
                            Также в этом блоке представлены главные параметры видео: название видео, его размер и дату создания.
                        </div>
                        <img class="container__image" src="./materials/info-about-materials.gif" alt=""/>
                    </div>

                </div>
            </div>

            <div class="text-container__semantic-block">
                <div class="semantic-block__text-block">
                    <h2 id="change-publication-title" class="text-block__title">Редактирование публикации</h2>
                    <div class="text-block__container">
                        <div class="container__text">
                            В этом блоке будет подробно показано, как редактировать материалы, загруженные на сайт.<br> Это необходимо в том случае, когда загруженная информация стала неактуальной или изменилась.
                        </div>
                    </div>
                </div>
                <div class="semantic-block__text-block">
                    <h3 id="change-materials" class="text-block__title">Изменение материалов</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            На видео пошагово показано, как изменять материалы на сайте.<br>
                            На сайт можно загружать одно либо несколько видео или фото, <b>однако</b> чем больше будет материалов, тем дольше будут обрабатываться запросы к серверу. <br>
                            <b>ВАЖНО!</b> Если нажать на форму и выбрать неоходимые материалы, однако не нажать на кнопку <span class="text__btn">Добавить</span> под формой и <b>закрыть или обновить страницу</b>, <b>МАТЕРИАЛЫ НЕ СОХРАНЯТСЯ</b>.<br> Так же можно удалить видео насовсем, нажав на значок <b>удалить</b>.
                        </div>
                        <img class="container__image" src="./materials/change-materials.gif" alt=""/>
                    </div>
                </div>
                <div class="semantic-block__text-block">
                    <h3 id="change-info-change-size" class="text-block__title">Изменение размеров материалов</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            Когда Вы загружаете видео публикации на сайт, из-за большого размера материала, оно может очень долго грузиться на сайте и еще дольше загружаться у пользователей с нестабильным интернет соединением. На видео показано, как изменять размер загружаемого материала. <br><b>Рекомендуется выбирать <span class="text__btn">Средний</span> размер, так как качество изображение ухудшается пренебрежимо мало, а загружается намного быстрее</b>
                        </div>
                        <img class="container__image" src="./materials/change-size.gif" alt=""/>
                    </div>
                </div>
                <div class="semantic-block__text-block">
                    <h3 id="change-text" class="text-block__title">Изменение текста</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            На видео пошагово показано, как писать название и описание для публикации на сайт.<br>
                            Здесь можно писать неограниченно много текста, так-как предельное количество текста для одной публикации составляет <b>1083621225 миллиардов символов</b>. <br>
                            В отличие от загрузки видео, текст <b>НЕ СОХРАНЯЕТСЯ</b> <b>автоматически</b>. <br> <b>Чтобы текст изменился</b>, необходимо нажать кнопку <span class="text__btn">Добавить</span> под формой.
                        </div>
                        <img class="container__image" src="./materials/upload-text.gif" alt=""/>
                    </div>

                </div>
                <div class="semantic-block__text-block">
                    <h3 id="change-info-about-materials" class="text-block__title">Изменение общей информации</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            Предположим, что Вы, загружая различные материалы, ошиблись и загрузили не то, что нужно. <br> Удалить это можно, нажав на кнопку мусорки, как показано на видео.<br>
                            Будьте внимательны! Материалы, которые Вы удалили, будут удалены <b>НАВСЕГДА</b>, вернуть их возможно только в том случае, если <b>сохранен первоначальный источник</b>.<br>
                            Также в этом блоке представлены главные параметры видео: название видео, его размер и дату создания.
                        </div>
                        <img class="container__image" src="./materials/info-about-materials.gif" alt=""/>
                    </div>

                </div>
                <div class="semantic-block__text-block">
                    <h3 id="delete-publication" class="text-block__title">Удаление публикации</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            <b>БУДЬТЕ ПРЕДЕЛЬНО ВНИМАТЕЛЬНЫ!</b> При удалении видео, вы не сможете восстановить его.
                        </div>
                        <img class="container__image" src="./materials/general-info-change-materials.gif" alt=""/>
                    </div>
                </div>

            </div>

            <div class="text-container__semantic-block">
                <div class="semantic-block__text-block">
                    <h2 id="work-with-comments-title" class="text-block__title">Работа с комментариями</h2>
                    <div class="text-block__container">
                        <div class="container__text">
                            К сожалению не все в интернете пишут приличные вещи, поэтому введена функция позволяющая удалять неприличные комментарии с сайта.
                        </div>
                    </div>
                </div>
                <div class="semantic-block__text-block">
                    <h3 id="general-info-about-work-with-comments" class="text-block__title">Общая информация</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            На видео показано как происходит работа с комментариями на сайте. Далее, после нажатия кнопки <b>ТОЛЬКО</b> администратор сайта сможет удалить комментарий лтбо отклонить жалобу на комментарий, как показано в следующем шаге.
                        </div>
                        <img class="container__image" src="./materials/general-info-about-work-with-comments.gif" alt=""/>
                    </div>

                </div>
                <div class="semantic-block__text-block">
                    <h3 id="work-with-comments" class="text-block__title">Удаление комментариев со стороны администратора</h3>
                    <div class="text-block__container">
                        <div class="container__text">
                            В панели администратора в разделе <b>Удаление комментариев</b> находятся все комментарии, на которые пожаловались пользователи. <br> <b>ОБОЗНАЧЕНИЯ: </b> <br> 1. Вверху блока с комментарием находится текст комментария, на который пожаловались <br> 2. Далее идут имя и почта того человека, который написал комментарий. <br> 3. Затем Вы можете либо отклонить жалобу, посчитав её недействительной, либо принять её и удалить комментарий. 
                        </div>
                        <img class="container__image" src="./materials/delete-comments.gif" alt=""/>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif?>
</body>

</html>