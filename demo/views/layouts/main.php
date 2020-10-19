<?php


use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php Yii::getAlias('@web') ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php Yii::getAlias('@web') ?>/css/mygrid.css">
    <link rel="shortcut icon" href="<?php Yii::getAlias('@web') ?>/img/logo.ico" type="image/x-icon">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
   <!-- <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

-->
    <header>
        <nav>
            <ul class="nav-links">
                <li>
                    <?= Html::a('Главная', ['/']) ?>
                </li>
                <li>
                    <?= Html::a('Главная<sub>admin</sub>', ['default/main']) ?>
                </li>
                <li>
                    <?= Html::a('Студийное фото<sub>admin</sub>', ['default/studio']) ?>
                </li>
               
                <li>
                    <?= Html::a('Альбом<sub>admin</sub>', ['album/index']) ?>
                </li>
                <li>
                    <?= Html::a('Видео<sub>admin</sub>', ['media/index']) ?>
                </li>
                <li>
                <li>
                    <?= Html::a('Выйти', ['/site/login']) ?>
                </li>
                </li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<script src="<?php Yii::getAlias('@web')?>/js/blazy.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
