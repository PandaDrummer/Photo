<?php

/* @var $this yii\web\View */

$this->title = 'Фотограф Питерман Александр';

use yii\helpers\Html; ?>
<div class="head_video">
    <video autoplay muted loop>
        <source src="<?php Yii::getAlias('@web') ?>/img/test.mp4" type="video/mp4">
    </video>
    <div class="head_video_text">
        <h2 data-aos="fade-up" >Александр</h2>
        <h2 data-aos="fade-up" data-aos-duration="1000">Питерман</h2>
    </div>
</div>
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
<section class="first_page container row">


    <div class="col-4 grid_img">
        <?php for ($i=0;$i<count($model);$i=$i+3): ?>
        <img class="b-lazy" src="<?php Yii::getAlias('@web') ?>/uploads/resize<?= $model[$i]->img ?>" data-src="<?php Yii::getAlias('@web') ?>/uploads/<?= $model[$i]->img ?>"  alt="">
        <?php endfor;?>

    </div>


        <div class="col-4 grid_img">
            <?php for ($i=1;$i<count($model);$i=$i+3): ?>
                <img class="b-lazy" data-src="<?php Yii::getAlias('@web') ?>/uploads/<?= $model[$i]->img ?>" src="<?php Yii::getAlias('@web') ?>/uploads/resize<?= $model[$i]->img ?>" alt="">
            <?php endfor;?>
        </div>


        <div class="col-4 grid_img">
            <?php for ($i=2;$i<count($model);$i=$i+3): ?>
                <img class="b-lazy" data-src="<?php Yii::getAlias('@web') ?>/uploads/<?= $model[$i]->img ?>" src="<?php Yii::getAlias('@web') ?>/uploads/resize<?= $model[$i]->img ?>" alt="">
            <?php endfor;?>
        </div>



</section>

<style>
    .b-lazy.b-loaded {
    
        transition: filter 0.3s;
        filter: none;
    }

    .b-lazy {
        width: 100%;
        filter: blur(2px);
    }
    footer{
        position: relative !important;
    }
</style>