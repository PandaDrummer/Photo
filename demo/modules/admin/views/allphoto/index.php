<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AllphotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Allphotos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allphoto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Allphoto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'personal_id',
            'img',
            [
                'format'=>'html',
                'label'=>'img',
                'value'=> function($data){
                    return Html::img($data->getImage(),['width'=>100]);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
