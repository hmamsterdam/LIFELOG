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
  <P>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述できます。</p>
@endsection

@section('footer')
  copyright 2019 hmamsterdam
@endsection
