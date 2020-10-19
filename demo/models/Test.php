<?php

namespace app\models;

use Gumlet\ImageResize;
use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $img
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
        ];
    }
    public function image($filename){
        $image = new ImageResize('uploads/' .$filename);;
        $image->scale(20);
        $image->save('uploads/resize' .$filename);
    }
}
