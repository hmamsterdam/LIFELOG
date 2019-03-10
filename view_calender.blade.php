<style>
th, td { width:100pt; font-size:20pt; }
td { height:70pt; vertical-align:top;　}
form { margin:0px; }
</style>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="./js/drag_drop.js"></script>

@extends('layouts.layout_lifelog')

@section('title', 'LIFELOG')

@section('menubar')
  @include('components.component_calender_menubar',
  ['menu1'=>'calender',
  'menu2'=>'activity',
  'menu3'=>'foodlog',
  'menu4'=>'balance'])
@endsection

@section('content')
  <table border="1">
    <tr>
    <th>日</th>
    <th>月</th>
    <th>火</th>
    <th>水</th>
    <th>木</th>
    <th>金</th>
    <th>土</th>
    </tr>
    <tr>
      {{$msg->index()}}
    </tr>
  </table>
@endsection

@section('footer')
  copyright 2019 hmamsterdam
@endsection
