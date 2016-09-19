@extends('front.template')

@section('main')
	<div id="heading-breadcrumbs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-7">
	                <h1>Register</h1>
	            </div>
	            <div class="col-md-5">
	                <ul class="breadcrumb">
	                    <li>{!! link_to('/', 'Home') !!}</li>
	                    <li>Register</li>
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
		                	<p class="lead">To register please fill this form :</p>		

							{!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form']) !!}	

								<div class="row">
									{!! Form::control('text', 12, 'username', $errors, 'Your Username *') !!}
									{!! Form::control('email', 12, 'email', $errors, 'Your Email *') !!}
									{!! Form::control('password', 12, 'password', $errors, 'Your Password *') !!}
									{!! Form::control('password', 12, 'password_confirmation', $errors, 'Confirm Your Password') !!}
								</div>

								<div class="row">	
									{!! Form::submit('Register', ['col-lg-12']) !!}
								</div>
								
							{!! Form::close() !!}
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