<?php

namespace app\modules\admin\controllers;

use app\models\ImageUpload;
use Yii;
use app\models\Allphoto;
use app\models\AllphotoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AllphotoController implements the CRUD actions for Allphoto model.
 */
class AllphotoController extends Controller
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
        $searchModel = new AllphotoSearch();
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
        $model = new Allphoto();

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
        $returnUrl = Yii::$app->request->referrer;
       // $this->vardump($returnUrl);
        $this->findModel($id)->delete();
         return $this->redirect($returnUrl);
    }


    public function actionSetImage($id)
    {
        $model = new ImageUpload();

        if(yii::$app->request->isPost){
            $product=$this->findModel($id);
            $file=UploadedFile::getInstance($model,'image');

            if($product->saveImage( $model->uploadFile($file,$product->img))){
                if($product->personal_id==1){
                    $this->redirect(['default/main']);
                }if($product->personal_id==2){
                    $this->redirect(['default/studio']);
                } else{
                    $this->redirect(["album/view?id=" . $product->personal_id]);
                }
            }
        }
        return $this->render('image', [
            'model' => $model,
        ]);
    }

    public function actionSaveAlbum($personal_id){
        $model=new Allphoto();
        $model_img=new ImageUpload();
        if (Yii::$app->request->post()) {
            $file = UploadedFile::getInstances($model, 'image');
            $i=0;
            foreach ($file as $a){
               // $this->vardump($personal_id);
                $model_img->uploadNewFile($a,$a->name,$personal_id);
                $i=$i+1;
            }
            if($i>0){
                if($personal_id==1){
                    return $this->redirect(['default/main']);
                }
                else if ($personal_id==2){
                    return $this->redirect(['default/studio']);
                }else{
                    return $this->redirect(['album/view', 'id' => $personal_id]);
                }

            }

        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }


    protected function findModel($id)
    {
        if (($model = Allphoto::findOne($id)) !== null) {
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
