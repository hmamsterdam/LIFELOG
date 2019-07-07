<?php
//php artisan serve
//http://localhost:8000/calender

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;  //これがなくてどはまり、全角スペースを挟んでまたはまり
use App\model_calender2;
use App\model_select;
use App\model_register;
use App\model_delete;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Intervention\Image\ImageManagerStatic as Image;

class controller_calender extends Controller
{
    public function index(Request $request)
    {
      $year = date( "Y" , time() );
      $month = date( "n" , time() );

      // 年月の指定があるか確認する
      if (null !== $request->input('month')) {
        $year = $request->input('year');
        $month = $request->input('month');
      }

      // データベースから対象月の写真を全て取得する
      $selects = new model_select;
      $selects = $selects->index($year, $month);
      // 日付と写真ファイル名をペアにする　←　model_calender2の処理で実現

      $calender = new model_calender2;
      $data = ['msg'=>$calender, 'year'=>$year, 'month'=>$month, 'selects'=>$selects];
      return view('calender.view_calender', $data);
    }

    public function register(Request $request)
    {
      $year = $request->input('year');
      $month = $request->input('month');
      $day = $request->input('day');

      // POST内容が画像登録か削除かで分岐
      if (null !== $request->input('download')) {
        $filename = $request->filename;
        $data = $request->data;

        // 画像の登録
        $register = new model_register;
        $register->index($year, $month, $day, $data, $filename);

      } else {
        // 削除
        $delete = new model_delete;
        $delete->index($year, $month, $day);

      }

      $selects = new model_select;
      $selects = $selects->index($year, $month);

      $calender = new model_calender2;
      $data = ['msg'=>$calender, 'year'=>$year, 'month'=>$month, 'selects'=>$selects];
      return view('calender.view_calender', $data);
    }
}
