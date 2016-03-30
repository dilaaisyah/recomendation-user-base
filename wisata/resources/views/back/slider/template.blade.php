@extends('back.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@stop

@section('main')

	<!-- Entête de page -->
	@include('back.partials.entete', ['title' => 'Slider / Advertise', 'icone' => 'pencil', 'fil' => link_to('slider', 'Slider') . ' / Creation'])

	<div class="col-sm-12">
		@yield('form')

		<div class="form-group checkbox pull-right">
			<label>
				{!! Form::checkbox('active') !!}
				{{ trans('back/blog.published') }}
			</label>
		</div>

		{!! Form::control('text', 0, 'title', $errors, trans('back/blog.title')) !!}

		{!! Form::control('textarea', 0, 'content', $errors, trans('back/blog.content')) !!}
		<div class="form-group">
			{!! Form::label('thumbnail', 'Image', ['class' => 'control-label']) !!}	
			@if(isset($slider))
				@if($slider->thumbnail)
				<div class="image">
	                <img src="{!! asset('filemanager/userfiles/slider/'.$slider->thumbnail) !!}" alt="" class="img-responsive">
	            </div>		
				@endif
			@endif
			{!! Form::file('thumbnail') !!}
		</div>

		{!! Form::submit(trans('front/form.send')) !!}

		{!! Form::close() !!}
	</div>

@stop



@section('scripts')

	{!! HTML::script('ckeditor/ckeditor.js') !!}
	
	<script>

	var config = {
		codeSnippet_theme: 'Monokai',
		language: '{{ config('app.locale') }}',
		height: 100,
		filebrowserBrowseUrl: '{!! url($url) !!}',
		toolbarGroups: [
			{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing',     groups: [ 'find', 'selection' ] },
			{ name: 'links' },
			{ name: 'tools' },
			{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'basicstyles', groups: [ 'basicstyles' ] },
			{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
			{ name: 'styles' },
		]
	};

	// CKEDITOR.replace( 'summary', config);

	config['height'] = 400;		

	CKEDITOR.replace( 'content', config);

  </script>

@stop