<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  //これがなくてどはまり、全角スペースを挟んでまたはまり


class controller_calender extends Controller
{
    public function index()
    {
      // return('成功！');
      $data = ['msg'=>'これはサンプル',];
      return view('calender.view_calender', $data);
    }
}
