<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class model_delete extends Model
{
    public function index($year, $month, $day)
    {
      $param = ['year'=>$year, 'month'=>$month, 'day'=>$day];
      DB::delete('delete from lifelog where year = :year and month = :month and day = :day', $param);
    }

}
