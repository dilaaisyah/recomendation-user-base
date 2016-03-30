@extends('back.slider.template')

@section('form')
	{!! Form::model($slider, ['route' => ['slider.update',$slider->id], 'method' => 'put', 'class' => 'form-horizontal panel', 'files'=>true]) !!}
@stop
