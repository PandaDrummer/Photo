<?php
$this->title = 'Альбомы';
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
<div class="album-index container">
    <?php foreach ($photo as $a): ?>
        <?php if ($a->id!=1 && $a->id!=2): ?>
            <div  class="col-4 personal" >

                <div class="personal-img ">
                    <?php if (isset($a->getPhoto()->one()->img)==true): ?>
                        <img class="b-lazy" src="<?php Yii::getAlias('@web') ?>/uploads/resize<?= $a->getPhoto()->one()->img;?>" data-src="<?php Yii::getAlias('@web') ?>/uploads/<?= $a->getPhoto()->one()->img;?>" alt="test image" >
                    <?php endif; ?>
                    <div class="overlay">
                        <?= Html::a('Посмотреть', ['view', 'id' => $a->id], []) ?>
                    </div>
                </div>

                <p style="text-align: center"> <?= $a->name?></p>

            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>