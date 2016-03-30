@extends('front.template')

@section('main')
	<div id="heading-breadcrumbs">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-7">
	                <h1>Forgot Password</h1>
	            </div>
	            <div class="col-md-5">
	                <ul class="breadcrumb">
	                    <li>{!! link_to('/', 'Home') !!}</li>
	                    <li>Forgot</li>
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
		                	@if(session()->has('status'))
			      				@include('partials/error', ['type' => 'success', 'message' => session('status')])
							@endif
							@if(session()->has('error'))
								@include('partials/error', ['type' => 'danger', 'message' => session('error')])
							@endif	
							<p>You have forgotten your password, dont mind ! You can create a new one. But for your own security we want to be sure of your identity. So send us your email by filling this form. You will get a message with instruction to create your new password.</p>

							{!! Form::open(['url' => 'password/email', 'method' => 'post', 'role' => 'form']) !!}	

								<div class="row">

									{!! Form::control('email', 12, 'email', $errors, 'Your email') !!}
									{!! Form::submit('send', ['col-lg-12']) !!}
									
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

