<?php

use yii\helpers\Html; ?>

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
            <?php for ($i=0;$i<count($photo);$i=$i+3): ?>

                <div class="hovereffect">
                    <img class="b-lazy img-responsive" onclick="view_photo('../uploads/<?= $photo[$i]->img ?>')" src="<?php Yii::getAlias('@web') ?>/uploads/resize<?= $photo[$i]->img ?>" data-src="<?php Yii::getAlias('@web') ?>/uploads/<?= $photo[$i]->img ?>"  alt="">
                </div>
            <?php endfor;?>

        </div>
        <div class="col-4 grid_img">
            <?php for ($i=1;$i<count($photo);$i=$i+3): ?>
                <div class="hovereffect">
                    <img class="b-lazy img-responsive" onclick="view_photo('../uploads/<?= $photo[$i]->img ?>')" src="<?php Yii::getAlias('@web') ?>/uploads/resize<?= $photo[$i]->img ?>" data-src="<?php Yii::getAlias('@web') ?>/uploads/<?= $photo[$i]->img ?>"  alt="">
                </div>
            <?php endfor;?>

        </div>
        <div class="col-4 grid_img">
            <?php for ($i=2;$i<count($photo);$i=$i+3): ?>
                <div class="hovereffect">
                    <img class="b-lazy img-responsive" onclick="view_photo('../uploads/<?= $photo[$i]->img ?>')" src="<?php Yii::getAlias('@web') ?>/uploads/resize<?= $photo[$i]->img ?>" data-src="<?php Yii::getAlias('@web') ?>/uploads/<?= $photo[$i]->img ?>"  alt="">
                </div>
            <?php endfor;?>

        </div>
        <div class="view_photo_click">
            <img id="photo_play" class="lazy img-responsive" src=""  alt="">
            <button  id="close_btn_img" >
                <img src="<?= Yii::getAlias('@web')?>/img/close.svg" alt="">
            </button>
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
