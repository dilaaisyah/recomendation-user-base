@extends('back.slider.template')

@section('form')
	{!! Form::open(['url' => 'slider', 'method' => 'post', 'class' => 'form-horizontal panel', 'files'=>true]) !!}	
@stop
