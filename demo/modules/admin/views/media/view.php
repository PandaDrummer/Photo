<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="media-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Сменить название', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Загрузить картинку', ['set-image', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Загрузить видео', ['set-video', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видео с YouTube', ['set-link', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row container">
        <div class="col-6">
            <img class="img-responsive" src="<?php Yii::getAlias('@web') ?>/uploads/<?= $model->img ?>" alt="">
        </div>
        <div class="col-6">
        	<?php if($model->link == 0): ?>
            <video width="100%" id="myVideo" controls>
                <source id="video_play" src="<?php Yii::getAlias('@web') ?>/video/<?= $model->video ?>"  type="video/mp4">
            </video>
            <?php else: ?>
            <iframe width="560" height="315" src=" https://www.youtube.com/embed/<?= $model->video ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php endif; ?>
        </div>
    </div>

</div>
