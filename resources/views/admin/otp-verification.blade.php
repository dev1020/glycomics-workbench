@extends('admin.layouts.simple')

@section('content')
    <div class="row g-0 justify-content-center bg-body-dark">
        <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
            <!-- Sign In Block -->
            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url('assets/media/photos/photo20@2x.jpg');">
                <div class="row g-0">
                    <div class="col-md-8 order-md-1 bg-body-extra-light">
                        <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="link-fx fw-bold fs-1" href="index.html">
                                    <span class="text-dark">GLY</span><span class="text-primary">COMICS</span>
                                </a>
                                <p class="text-uppercase fw-bold fs-sm text-muted">Verify Otp</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{ route('admin-otp') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="otp" class="form-label">Please provide the otp to verify:</label>
                                    <input type="text" class="form-control form-control-alt" id="login-otp" name="otp" >
                                </div>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn w-100 btn-hero btn-success">
                                                <i class="fa fa-fw fa-check-circle opacity-50 me-1"></i> Verify Otp
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn w-100 btn-hero btn-primary">
                                                <i class="fa fa-fw fa-repeat opacity-50 me-1"></i> Resend Otp
                                            </button>
                                        </div>
                                    </div>



                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                        @if($errors)
                            <div class='error small text-danger'>{{$errors->first()}}</div>
                        @endif
                    </div>
                    <div class="col-md-4 order-md-0 bg-primary-dark-op d-flex align-items-center">
                        <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                            <div class="d-flex">
                                <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar9.jpg" alt="">
                                </a>
                                <div class="flex-grow-1">
                                    <p class="text-white fw-semibold mb-1">
                                        since the 1500s,
                                    </p>
                                    <a class="text-white-75 fw-semibold" href="javascript:void(0)">Jose Wagner, Web Developer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Sign In Block -->
        </div>
    </div>
@endsection
