@extends('front.template')

@section('main')
	
	<div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ $post->title }}</h1>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li>{!! link_to('/', 'Home') !!}</li>
                        <li>Advertisement</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <div class="row">

                <!-- *** LEFT COLUMN ***-->
                <div class="col-md-9" id="blog-post">

                    <p class="text-muted text-uppercase mb-small text-right">
                    	{!! $post->created_at !!}
                    </p>
                    
                    <div id="post-content">
                        @if($post->thumbnail)
                            <img src="{!! asset('filemanager/userfiles/slider/'.$post->thumbnail) !!}" alt="{!! $post->title !!}" class="img-responsive">
                            <br>  
                        @endif                     
						{!! $post->content !!}                        
                    </div>
                    <!-- /#post-content -->

                </div>
                <!-- /#blog-post -->
                <!-- *** LEFT COLUMN END *** -->

        		@include('partials.sidebar')

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

    <br><br><br>

@stop