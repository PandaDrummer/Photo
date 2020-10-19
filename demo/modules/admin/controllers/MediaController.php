<?php

namespace app\modules\admin\controllers;

use app\models\ImageUpload;
use Yii;
use app\models\Media;
use app\models\MediaSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class MediaController extends Controller
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
        $searchModel = new MediaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Media();

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
    public function actionSetImage($id)
    {
        $model = new ImageUpload();
        if(yii::$app->request->isPost){
            $product=$this->findModel($id);
            $file=UploadedFile::getInstance($model,'image');

            if($product->saveImage( $model->uploadFile($file,$product->img))){
                return $this->render('view',[
                    'model' => $this->findModel($product->id)
                ]);
            }
        }
        return $this->render('image', [
            'model' => $model,
        ]);
    }
    public function actionSetVideo($id)
    {
        $model = new ImageUpload();
        if(yii::$app->request->isPost){
            $product=$this->findModel($id);
            $file=UploadedFile::getInstance($model,'image');


            if($product->saveVideo( $model->uploadVideo($file,$product->video))){
                return $this->render('view',[
                    'model' => $this->findModel($product->id)
                ]);
            }
        }
        return $this->render('image', [
            'model' => $model,
        ]);
    }
    public function actionSetLink($id){
    	$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
        	$a = Media::GetYoutubeVideoID(Yii::$app->request->post()['Media']['video']);
        	$model->video = $a;
        	$model->link = 1;
        	$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('link', [
            'model' => $model,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = Media::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
