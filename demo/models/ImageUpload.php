<?php
namespace app\models;

use app\jobs\MyJob;
use Gumlet\ImageResize;
use Yii;
use yii\base\Model;
use yii\debug\models\search\Mail;
use yii\web\UploadedFile;
use app\models\MyWorker;


class ImageUpload extends  Model{

    public $image ;

    public function rules()
    {
        return [
            [['image'], 'file', 'maxFiles' => 20],
        ];
    }

    public function uploadFile(UploadedFile $file,$currentimg){
        if($currentimg!=NULL){
            if (file_exists('uploads/' . $currentimg)) {
                unlink(Yii::getAlias('@web').'uploads/' . $currentimg);
                if(file_exists('uploads/resize' . $currentimg)){
                    unlink('uploads/resize' . $currentimg);
                }
            }
        }

        $uniqname = uniqid($file->baseName) . '.' . $file->extension;
        $file->saveAs('uploads/' . $uniqname);
        Yii::$app->queue->push(new MyWorker([
                'file' => $uniqname
            ]));
        return $uniqname;
    }
    public function  uploadNewFile (UploadedFile $file,$currentimg,$personal_id)
    {

        if ($this->validate()) {

            if (file_exists('uploads/' . $currentimg)) {

                unlink('uploads/' . $currentimg);
                if(file_exists('uploads/resize' . $currentimg)){
                    unlink('uploads/resize' . $currentimg);
                }
            }
            $uniqname = uniqid($file->baseName) . '.' . $file->extension;
            $model = new Allphoto();
            $model->img = $uniqname;
            $model->personal_id=$personal_id;
            $model->save();
            $file->saveAs('uploads/' . $uniqname);
            Yii::$app->queue->push(new MyWorker([
                'file' => $uniqname
            ]));
            return $uniqname;
        }
    }
    public function uploadVideo(UploadedFile $file,$currentvideo){
        if($currentvideo!=NULL){

            if (file_exists(Yii::getAlias('@web') . 'video/' .$currentvideo)) {

                unlink(Yii::getAlias('@web') . 'video/' .$currentvideo);}
        }

        $uniqname = uniqid($file->baseName) . '.' . $file->extension;
        $file->saveAs('video/' . $uniqname);
        return $uniqname;
    }
    public function deleteCurrentvideo($currentvideo){

        if(file_exists('video/' . $currentvideo) &&$currentvideo!=null ){
        	 unlink('video/' . $currentvideo);
        }
    }

    public function deleteCurrentimg($currentimg){
        if (file_exists('uploads/' . $currentimg &&$currentvideo!=null)) {
            unlink('uploads/' . $currentimg);
        }
        if(file_exists('uploads/resize' . $currentimg &&$currentvideo!=null)){
            unlink('uploads/resize' . $currentimg);
        }
    }
    /*
            $image = new ImageResize('uploads/' .$this->file);
            $image->scale(20);
            $image->save('uploads/resize' .$this->file);
            */
}