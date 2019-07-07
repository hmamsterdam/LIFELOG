<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class model_select extends Model
{
    public function index($year='', $month='')
    {
      $param = ['year'=>$year, 'month'=>$month];
      $items = DB::select('select day, file from lifelog where year = :year and month = :month', $param);
      return $items;
    }


}
