<?php

namespace app\modules\admin\controllers;

use app\models\Allphoto;
use app\models\ImageUpload;
use Gumlet\ImageResize;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class DefaultController extends Controller
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
        return $this->render('index');
    }
    public function actionMain(){
        $photo=Allphoto::findAll(['personal_id'=>'1']);
        return $this->render('main', [
            'photo' => $photo,
        ]);
    }
    public function actionStudio(){
        $photo=Allphoto::findAll(['personal_id'=>'2']);
        return $this->render('studio', [
            'photo' => $photo,
        ]);
    }
    public function actionClearMain(){
        $photo=Allphoto::findAll(['personal_id'=>'1']);
        $allphoto=new Allphoto();
        foreach ($photo as $a){

            $upload=new ImageUpload();
            $upload->deleteCurrentimg($a->img);
            $allphoto->deleteAll(['personal_id'=>'1']);
        }
        $this->redirect('main');
    }
    public function actionClearStudio(){
        $photo=Allphoto::findAll(['personal_id'=>'2']);
        $allphoto=new Allphoto();
        foreach ($photo as $a){

            $upload=new ImageUpload();
            $upload->deleteCurrentimg($a->img);
            $allphoto->deleteAll(['personal_id'=>'2']);
        }
        $this->redirect('studio');

    }
}
