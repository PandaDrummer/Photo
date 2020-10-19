<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php Yii::getAlias('@web') ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php Yii::getAlias('@web') ?>/css/mygrid.css">
        <link rel="shortcut icon" href="<?php Yii::getAlias('@web') ?>/img/logo.ico" type="image/x-icon">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>


    <?= $content ?>


<!--
    <footer>
        <div class="row container">
            <div class="col-6">телефон:+7231245125512</div>
            <div class="col-6">телефон:+7231245125512</div>
        </div>

    </footer> -->

    <?php $this->endBody() ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=" <?php Yii::getAlias('@web')?>/js/main.js"></script>
    <script src="<?php Yii::getAlias('@web')?>/js/blazy.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        $(".burger").click(function() {
            $(".nav-links").toggleClass("nav-active");
            $(".line1").toggleClass("line1-toggle");
            $(".line2").toggleClass("line2-toggle");
            $(".line3").toggleClass("line3-toggle");
        });
    </script>
    <script>
        AOS.init();
    </script>
    </body>
    </html>
<?php $this->endPage() ?>