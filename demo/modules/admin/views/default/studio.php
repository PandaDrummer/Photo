<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

\yii\web\YiiAsset::register($this);
?>
<div class="album-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Загрузить картинку', ['allphoto/save-album', 'personal_id' => '2'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Очистить', ['default/clear-studio'], ['class' => 'btn btn-danger']) ?>
    </p>

    <section class="first_page container row">

        <div class="col-4 grid_img">
            <?php for ($i=0;$i<count($photo);$i=$i+3): ?>
                <div class="hovereffect">
                    <img class="img-responsive" src="<?php Yii::getAlias('@web') ?>/uploads/<?= $photo[$i]->img ?>" alt="">
                    <div class="overlay">
                        <p>
                            <?= Html::a('Изменить', ['allphoto/set-image', 'id' => $photo[$i]->id]) ?>
                            <br>
                            <?= Html::a('Удалить', ['allphoto/delete', 'id' => $photo[$i]->id],[
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                        <br>

                    </div>
                </div>
            <?php endfor;?>

        </div>
        <div class="col-4 grid_img">
            <?php for ($i=1;$i<count($photo);$i=$i+3): ?>
                <div class="hovereffect">
                    <img class="img-responsive" src="<?php Yii::getAlias('@web') ?>/uploads/<?= $photo[$i]->img ?>" alt="">
                    <div class="overlay">
                        <p>
                            <?= Html::a('Изменить', ['allphoto/set-image', 'id' => $photo[$i]->id]) ?>
                            <br>
                            <?= Html::a('Удалить', ['allphoto/delete', 'id' => $photo[$i]->id],[
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                        <br>

                    </div>
                </div>
            <?php endfor;?>

        </div>
        <div class="col-4 grid_img">
            <?php for ($i=2;$i<count($photo);$i=$i+3): ?>
                <div class="hovereffect">
                    <img class="img-responsive" src="<?php Yii::getAlias('@web') ?>/uploads/<?= $photo[$i]->img ?>" alt="">
                    <div class="overlay">
                        <p>
                            <?= Html::a('Изменить', ['allphoto/set-image', 'id' => $photo[$i]->id]) ?>
                            <br>
                            <?= Html::a('Удалить', ['allphoto/delete', 'id' => $photo[$i]->id],[
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                            
                        </p>
                        <br>

                    </div>
                </div>
            <?php endfor;?>

        </div>


    </section>
  

</div>
