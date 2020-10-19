<?php

namespace app\modules\admin\controllers;

use app\models\Allphoto;
use app\models\ImageUpload;
use Yii;
use app\models\Album;
use app\models\AlbumSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class AlbumController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $photo= Album::find()->all();
/*
            foreach ($photo as $a){
                if (isset($a->getPhoto()->one()->img)){
                    $this->vardump($a->getPhoto()->one()->img);
                }
               // $this->vardump(isset($a->getPhoto()->one()->img));
               // $this->vardump($a->getPhoto()->one()->img);
            }
*/

        return $this->render('index', [
            'photo'=>$photo
        ]);

    }


    public function actionView($id)
    {
        $photo=Allphoto::findAll(['personal_id'=>$id]);
        if($id!=1&&$id!=2){
            return $this->render('view', [
                'model' => $this->findModel($id),
                'photo'=> $photo,
            ]);
        }else{
            $this->redirect(['index']);
        }

    }


    public function actionCreate()
    {
        $model = new Album();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    function vardump($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
