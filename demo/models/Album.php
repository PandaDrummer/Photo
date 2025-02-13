<?php

namespace app\models;

use Yii;


class Album extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'album';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
           // [['category'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category' => 'Category',
        ];
    }
    public function getPhoto()
    {
        return $this->hasMany(Allphoto::className(), ['personal_id' => 'id']);
    }

    public function deleteImage(){
        $upload = new ImageUpload();
        $allphoto= new Allphoto();
        $photo =$this->getPhoto()->all();
        foreach ($photo as $a){
            $allphoto->deleteAll(['personal_id'=>$this->id]);
            $upload->deleteCurrentImg($a->img);
        }
    }
    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
