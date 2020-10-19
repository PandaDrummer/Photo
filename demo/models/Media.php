<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property string $img
 * @property string $video
 * @property string $title
 */
class Media extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'media';
    }


    public function rules()
    {
        return [
            [[ 'title'], 'required'],
            [['img', 'video', 'title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'video' => 'Video',
            'title' => 'Title',
            'link' => 'Link',
        ];
    }
    public function saveImage($filename){
        $this->img = $filename;
        return $this->save(false);

    }
    public function saveVideo($filename){
        $this->video = $filename;
        $this->link = 0;
        return $this->save(false);

    }

    public function getImage(){
        if ($this->img){
            return Yii::getAlias('@web').'/'.'uploads/' . $this->img;
        }
    }
	public static function GetYoutubeVideoID($url)
{
	if(strripos($url, "youtube.com"))
	{
		parse_str(parse_url($url, PHP_URL_QUERY), $you);
		$youtube_id = $you["v"];
	}
	elseif(strripos($url, "youtu.be"))
	{
		$you_mass = explode("/", $url);
		$youtube_id = $you_mass[count($you_mass) - 1];
	}
	
	if(!empty($youtube_id))
		return $youtube_id;
}

    public function deleteVideo(){
        $upload = new ImageUpload();
        $upload->deleteCurrentImg($this->img);
        $upload->deleteCurrentvideo($this->video);
    }
	
    public function beforeDelete()
    {

        $this->deleteVideo();
        return parent::beforeDelete();
    }
}
