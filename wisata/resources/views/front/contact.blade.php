@extends('front.template')

@section('main')
	<div id="heading-breadcrumbs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-7">
	                <h1>Contact</h1>
	            </div>
	            <div class="col-md-5">
	                <ul class="breadcrumb">
	                    <li>{!! link_to('/', 'Home') !!}</li>
	                    <li>Contact</li>
	                </ul>

	            </div>
	        </div>
	    </div>
	</div>

	<div id="content">
	    <div class="container">
	        <section>
	            <div class="row">
	                <div class="col-md-12 clearfix">

	                	<p class="lead">If you wish to send a message please fill this form :</p>				
					
						{!! Form::open(['url' => 'contact', 'method' => 'post', 'role' => 'form']) !!}	
						
							<div class="row">
								
								{!! Form::control('text', 6, 'name', $errors, 'Name') !!}
								{!! Form::control('email', 6, 'email', $errors, 'Email') !!}
								{!! Form::control('textarea', 12, 'message', $errors, 'Message') !!}

							  	{!! Form::submit('Send', ['col-lg-12']) !!}

							</div>
							
						{!! Form::close() !!}

	                </div>
	                <!-- /.col-md-12 -->
	            </div>
	            <!-- /.row -->
	        </section>
	    </div>
	    <!-- /.container -->
	</div>
	<!-- /#content -->
@stop