@extends('front.template')

@section('main')
	<div id="heading-breadcrumbs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-7">
	                <h1>Login</h1>
	            </div>
	            <div class="col-md-5">
	                <ul class="breadcrumb">
	                    <li>{!! link_to('/', 'Home') !!}</li>
	                    <li>Login</li>
	                </ul>

	            </div>
	        </div>
	    </div>
	</div>

	<div id="content">
	    <div class="container">
	        <section>
	            <div class="row register-login">
	                <div class="col-md-6 clearfix">

	                	<div class="box">
		                	<p class="lead">To log on this site you must fill this form :</p>	

		                	@if(session()->has('error'))
								@include('partials/error', ['type' => 'danger', 'message' => session('error')])
							@endif			
					
							{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}	
							
							<div class="row">

								{!! Form::control('text', 12, 'log', $errors, 'Your email or your user name') !!}
								{!! Form::control('password', 12, 'password', $errors, 'Your password') !!}
								{!! Form::submit('LOGIN', ['col-lg-12']) !!}
								{!! Form::check('memory', trans('front/login.remind')) !!}  
								<div class="col-lg-12">					
									{!! link_to('password/email', trans('front/login.forget')) !!}
								</div>

							</div>
							
							{!! Form::close() !!}

							<div class="text-center">
								<hr>
									<h2 class="intro-text text-center">{{ trans('front/login.register') }}</h2>
								<hr>	
								<p>{{ trans('front/login.register-info') }}</p>
								{!! link_to('auth/register', trans('front/login.registering'), ['class' => 'btn btn-template-main']) !!}
							</div>
						</div>

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
