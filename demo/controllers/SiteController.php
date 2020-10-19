<?php

namespace app\controllers;

use app\jobs\MyJob;
use app\models\Album;
use app\models\Allphoto;
use app\models\Media;
use app\models\User;
use Gumlet\ImageResize;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout='front';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	
    public function actionIndex()
    {
        $model=Allphoto::findAll(['personal_id'=>'1']);
        return $this->render('index',[
            'model' => $model,
        ]);
    }
    public function actionStudio(){
        $photo=Allphoto::findAll(['personal_id'=>'2']);
        return $this->render('studio', [
            'photo' => $photo,
        ]);
    }
    public function actionAlbum(){
        $photo= Album::find()->all();
        return $this->render('album', [
            'photo'=>$photo
        ]);
    }
    public function actionView($id){
        $photo=Allphoto::findAll(['personal_id'=>$id]);
        if($id!=1&&$id!=2){
            return $this->render('view', [
                'model' => $this->findModel($id),
                'photo'=> $photo,
            ]);
        }else{
            $this->redirect(['album']);
        }

    }
    public function actionMedia(){
        $media= Media::find()->all();
        return$this->render('media',[
            'media'=>$media
        ]);
    }
    public function actionAbout(){
        return$this->render('about');
    }
    public function actionLogin(){
        Yii::$app->user->logout();
        $model = new Loginform();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $user = User::find()->where(['username' => $model->username, 'password' => $model->password])->one();
            if($user){
                Yii::$app->user->login($user);
                $this->redirect('../admin/default/index');
            }
            else{
                $this->redirect('login');
            }
        } else {

            return $this->render('loginform', ['model' => $model]);
        }
    }
    public function actionTest(){
       // list($width_orig, $height_orig) = getimagesize('uploads/45e3791d851e16.jpg');
        //var_dump(file_exists(Yii::getAlias('@web'). 'uploads/45e3791d851e16.jpg'));
        //Yii::$app->thumbler->resize('IMG_1833 — копия — копия (2)5f7095a597f42.jpg',500,500);

        $this->vardump(isset(exif_read_data('uploads/IMG_1833 — копия — копия (2)5f7319bef1c77.jpg',0,true)["IFD0"]["Orientation"]) );

        /*
        $model=Allphoto::findAll(['personal_id'=>'1']);
        foreach ( $model as $item){
            Yii::$app->queue->delay(1)->push(new MyJob([
                'file' => $item->img
            ]));
        }
        */
    }

    protected function findModel($id)
    {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //$this->vardump($photo->getPhoto());
    function vardump($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

}
