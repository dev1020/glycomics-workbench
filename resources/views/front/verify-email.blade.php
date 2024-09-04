@extends('front.layouts.simple')

@section('content')
    
	<section class="">
        <div class="px-4 py-5 px-md-5 text-lg-start">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5 px-4 py-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                             class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <h1>Verify email</h1>

						<p>Please verify your email address by clicking the link in the mail we just sent you. Thanks!</p>
						<p class="small">Also check your spam and junk folders</p>

						<form action="{{ route('verification.request') }}" method="post">
							@csrf
							<button  class="btn btn-outline-info" type="submit">Request a new link</button>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
