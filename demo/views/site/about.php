<?php

use yii\helpers\Html;
$this->title = 'Обо мне';
?>
<header>
    <nav>
        <ul class="nav-links">
            <li>
                <?= Html::a('Главная', ['/']) ?>
            </li>
          
            <li>
                <?= Html::a('Альбомы', ['site/album']) ?>
            </li>
            <li>
                <?= Html::a('Видео ', ['site/media']) ?>
            </li>
            <li>
                <?= Html::a('Обо мне', ['site/about']) ?>
            </li>
            <?php if (!Yii::$app->user->isGuest): ?>
                <li>
                    <?= Html::a('Админка', ['admin/default/index']) ?>
                </li>
            <?php endif; ?>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>
<section class="container about-block">
    <div class="row">
        <div class="col-4 ">
        	<img src="img/aboutme.jpg" style="width: 100%;
    object-fit: cover;"> </img>
        </div>
        <div class="col-1"></div>
        <div class="col-7 text-about">
            <div style="padding-top: 7vh;">
                <h2 data-aos="fade-up" >Доброго времени суток!</h2>
                <h2 data-aos="fade-up" data-aos-duration="500">Меня зовут Александр Питерман. Я - фотограф.</h2>
                <p data-aos="fade-up" data-aos-duration="1000">Фотографией занимаюсь с 2018 года. Снимаю в разных городоах.
                    Моя основная задача как фотографа - это на долгие годы сохранить пережитые вами эмоции в день съемки.
                    Мы вместе создаем историю. Это так ответственно и удивительно прекрасно.
                    Я помогу вам чувствовать себя удобно в кадре, даже если вы не умеете фотографироваться.</p>
            </div>
            <div class="contact">
                <strong data-aos="fade-up"  data-aos-anchor-placement="top-bottom">Для связи:</strong>

                <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">Telegram: +7 996 591 15 32</p>

                <p data-aos="fade-up" data-aos-duration="1500" data-aos-anchor-placement="top-bottom">Instagram: @piterman96</p>

                <p data-aos="fade-up" data-aos-duration="2000" data-aos-anchor-placement="top-bottom">VK: https://vk.com/id150957383</p>

            </div>
        </div>
    </div>

</section>