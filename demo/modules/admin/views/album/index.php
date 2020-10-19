<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Allphoto;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Альбомы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать альбом', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php foreach ($photo as $a): ?>
    <?php if ($a->id!=1 && $a->id!=2): ?>
        <div class="col-4 personal" >

            <div class="personal-img ">
                <?php if (isset($a->getPhoto()->one()->img)==true): ?>
                <img src="<?php Yii::getAlias('@web') ?>/uploads/<?= $a->getPhoto()->one()->img;?>" alt="test image" >
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
