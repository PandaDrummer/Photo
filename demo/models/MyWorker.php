<?php
namespace app\models;
use yii\base\BaseObject;
use yii\queue\JobInterface;

 class MyWorker extends BaseObject implements JobInterface{
     public $file;
     public $fileType;
     public function execute($queue)
     {
         $trueFilePath = getcwd() .'/alex_photo/public_html/web/uploads/'. $this->file;
    
         
         if (file_exists($trueFilePath)){
             list($width_orig, $height_orig) = getimagesize($trueFilePath);
         }
         
         $this->findType($trueFilePath);
         $orientation =$this->findOrientation($trueFilePath);
         $new_image =imagecreatetruecolor($width_orig*0.1 , $height_orig * 0.1);
         $preparedImage = $this->preparedImage($trueFilePath);

         if ($this->fileType == 3){
             imagealphablending( $new_image, false );
             imagesavealpha( $new_image, true );
         }
         imagecopyresampled(
             $new_image,
             $preparedImage ,
             0 ,
             0,
             0,
             0,
             $width_orig*0.1 ,
             $height_orig*0.1,
             $width_orig,
             $height_orig);
        $this->save($new_image, $orientation);
        imagedestroy($new_image);
        
     }
     public function findOrientation($fileName){
        $a = @exif_read_data($fileName,0,true);
         if($this->fileType == 2){
             if(isset($a["IFD0"]["Orientation"])){
                 $orientation = $a["IFD0"]["Orientation"];
             } else $orientation = null;
         } elseif($this->fileType == 3) {
             $orientation = null;
         }
         return $orientation;
     }
     public function findType($fileName){
         $this->fileType = exif_imagetype($fileName);
         return $this->fileType;
     }
    public function preparedImage($fileName){
         if ($this->fileType ==2){
             return imagecreatefromjpeg($fileName);
         } elseif($this->fileType ==3){
             return imagecreatefrompng($fileName) ;
         }elseif ($this->fileType ==18){
            return  imagecreatefromwebp($fileName);
         }
    }
    public function save($new_image , $orientation){
         if($orientation != null){
             if ( $orientation == 6 || $orientation == 5){
                 $a= imagerotate($new_image , 270 , NULL);
                 imagejpeg($a, getcwd() .'/alex_photo/public_html/web/uploads/resize'. $this->file);
                 imagedestroy($a);
                 imagedestroy($new_image);
             }elseif ($orientation == 3 || $orientation == 4){
                 $a= imagerotate($new_image , 180 , NULL);
                 imagejpeg($a, getcwd() .'/alex_photo/public_html/web/uploads/resize'. $this->file);
                 imagedestroy($a);
                 imagedestroy($new_image);
             } elseif ($orientation == 8 || $orientation == 7){
                 $a= imagerotate($new_image , 90 , NULL);
                 imagejpeg($a, getcwd() .'/alex_photo/public_html/web/uploads/resize'. $this->file);
                 imagedestroy($a);
                 imagedestroy($new_image);
             }else{
                 imagepng($new_image, getcwd() .'/alex_photo/public_html/web/uploads/resize'. $this->file) ;
                 imagedestroy($new_image);
             }
         }else {
             imagepng($new_image, getcwd() .'/alex_photo/public_html/web/uploads/resize'. $this->file) ;
             imagedestroy($new_image);
         }
    }
 }