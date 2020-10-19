<?php

use yii\helpers\Html;
$this->title = 'Видео';
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



<section class="video_page">
    <?php foreach ($media as $a): ?>
    
    <div class="video_page_block" onclick="view_video('<?=$a->video ?>' , '<?=$a->link ?>')" style="background-image: url(<?php Yii::getAlias('@web') ?>/uploads/<?= $a->img ?>);">

        <h2  data-aos="fade-up" ><?=$a->title ?></h2>
    </div>
    <?php endforeach; ?>

</section>
<div class="video_page_video">
    <video width="400" id="myVideo" controls>
        <source id="video_play"  type="video/mp4">
    </video>
    <button  id="close_btn" >
        <img src="<?= Yii::getAlias('@web')?>/img/close.svg" alt="">
    </button>
</div>
<div class="video_page_video_yt">
         <iframe id="yt" width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
    <button  id="close_btn_yt" >
        <img src="<?= Yii::getAlias('@web')?>/img/close.svg" alt="">
    </button>
</div>
<script type="text/javascript" src="http://www.youtube.com/player_api"></script>