@extends('layouts.simple')

@section('content')
    <div class="row g-0 justify-content-center bg-body-dark">
        <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
            <!-- Sign Up Block -->
            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url('assets/media/photos/photo12.jpg');">
                <div class="row g-0">
                    <div class="col-md-6 order-md-1 bg-body-extra-light">
                        <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="link-fx fw-bold fs-1" href="index.html">
                                    <span class="text-dark">NIW</span><span class="text-primary">CAB</span>
                                </a>
                                <p class="text-uppercase fw-bold fs-sm text-muted">Create New Account</p>
                            </div>
                            <!-- END Header -->
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            @if(Session::has('success'))
                                <p class="small text-success">{{ Session::get('success') }}</p>
                            @endif
                            <!-- Sign Up Form -->
                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <input type="text" class="form-control form-control-alt" id="signup-username" name="name" placeholder="Username">
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="form-control form-control-alt" id="signup-email" name="email" placeholder="Email">
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control form-control-alt" id="signup-password" name="password" placeholder="Password">
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control form-control-alt" id="signup-password-confirm" name="password_confirmation" placeholder="Password Confirm">
                                </div>
                                <div class="mb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">Terms &amp; Conditions</a>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms">
                                        <label class="form-check-label" for="signup-terms">I agree</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn w-100 btn-hero btn-primary">
                                        <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Sign Up
                                    </button>
                                </div>
                            </form>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                    <div class="col-md-6 order-md-0 bg-xwork-op d-flex align-items-center">
                        <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                            <div class="d-flex">
                                <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar6.jpg" alt="">
                                </a>
                                <div class="flex-grow-1">
                                    <p class="text-white fw-semibold mb-1">
                                        The service was a valuable asset to improve our conversions and marketing efforts! Thank you!
                                    </p>
                                    <a class="text-white-75 fw-semibold" href="javascript:void(0)">Amanda Powell, CEO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Sign Up Block -->
        </div>

        <!-- Terms Modal -->
        <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Terms &amp; Conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->
    </div>

@endsection
