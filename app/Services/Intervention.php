<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;




class Intervention{

  /** 
   * 
   * @param $image
   * Image from the request
   * 
   * @param $y 
   * desired x size for the image
   * 
   * @param $y 
   * desired y size for the image
   * 
   * @param $disk
   * name of the disk where you want to store your image
   * 
   * @param $pre = ''
   * prefix for the file
   * 
   * @return $name
   * hashname to store in db 
   */
  public static function storeImage($image, $x, $y, $disk, $pre = ''){
    
    $name = $image->store($pre, $disk);
    $path = Storage::disk($disk)->path($name);
    $resize = Image::make($path)->resize($x,$y);
    $save = $resize->save();
    return $name;

  }
  /** 
   * 
   * @param $image
   * Image from the request
   * 
   * @param $y 
   * desired x size for the image
   * 
   * @param $y 
   * desired y size for the image
   * 
   * @param $disk
   * name of the disk where you want to store your image
   * 
   * @param $pre = ''
   * prefix for the file
   * 
   * @return $name
   * hashname to store in db 
   */
  public static function storeImageCrop($image, $x, $y, $disk, $pre = ''){
    
    $name = $image->store($pre, $disk);
    $path = Storage::disk($disk)->path($name);
    $resize = Image::make($path)->crop($x,$y);
    $save = $resize->save();
    return $name;

  }

}