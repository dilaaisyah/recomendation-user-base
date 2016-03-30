@extends('front.template')

@section('main')
	<div id="heading-breadcrumbs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-7">
	                <h1>Reset Password</h1>
	            </div>
	            <div class="col-md-5">
	                <ul class="breadcrumb">
	                    <li>{!! link_to('/', 'Home') !!}</li>
	                    <li>Reset</li>
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
		                	@if(session()->has('error'))
								@include('partials/error', ['type' => 'danger', 'message' => session('error')])
							@endif	
							<p class="lead">To create a new password please fill this form :</p>		

							{!! Form::open(['url' => 'password/reset', 'method' => 'post', 'role' => 'form']) !!}	

								<div class="row">

									{!! Form::hidden('token', $token) !!}
									{!! Form::control('email', 12, 'email', $errors, 'Your email') !!}
									{!! Form::control('password', 12, 'password', $errors, 'Your password') !!}
									{!! Form::control('password', 12, 'password_confirmation', $errors, 'Confirm your password') !!}
									{!! Form::submit('Reset', ['col-lg-12']) !!}

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

