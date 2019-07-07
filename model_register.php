<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Intervention\Image\ImageManagerStatic as Image;

class model_register extends Model
{
    public function index($year, $month, $day, $data, $filename)
    {
      // 画像の保存
      $photo = Image::make($data)->resize(130, 100);
      $photo->save(public_path('/images/' . $filename));

      $param = [
        'year' => $year,
        'day' => $day,
        'file' => ('/images/' . $filename),
        'month' => $month,
      ];

      // 画像の登録
      DB::insert('insert into lifelog (year, day, file, month) values (:year, :day, :file, :month)', $param);
    }


}
