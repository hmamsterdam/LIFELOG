<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  //これがなくてどはまり、全角スペースを挟んでまたはまり
use App\model_calender;
use App\model_register;

use Illuminate\Http\Response;

class controller_calender extends Controller
{
    public function index()
    {
      $calender = new model_calender;

      $data = ['msg'=>$calender,];
      return view('calender.view_calender', $data);
    }

    public function post(Request $request)
    {
      $register = new model_register;

      $data = ['msg'=>$register,];
      return view('calender.view_calender', $data);
    }
}
