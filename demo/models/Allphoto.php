<?php

namespace app\models;

use Yii;


class Allphoto extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'allphoto';
    }


    public function rules()
    {
        return [
            [['personal_id', 'img'], 'required'],
            [['personal_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personal_id' => 'Personal ID',
            'img' => 'Img',
        ];
    }
    public function saveNewImage($filename,$personal_id){
        $this->img = $filename;
        $this->personal_id=$personal_id;
        return $this->save(false);
    }

    public function saveImage($filename){
        $this->img = $filename;
        return $this->save(false);

    }

    public function getImage(){
        if ($this->img){
            return Yii::getAlias('@web').'/'.'uploads/' . $this->img;
        }
    }

    public function deleteImage(){
        $upload = new ImageUpload();
        $upload->deleteCurrentImg($this->img);
    }
    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }
}
