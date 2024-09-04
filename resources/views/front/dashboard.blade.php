@extends('front.layouts.profile')
@section('content')
    <div class="text-lg-start">
        <div class="container h-custom">
            <div class="row d-flex justify-content-center h-100">

                <!-- Main Content Area -->
                <main class="col-md-12 ms-sm-auto col-lg-12" style="min-height: 50vh">

                    <div class="pt-3 pb-2 mb-3 border-bottom">
                        <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                            <li class="breadcrumb-item"><a href="{{ implode('/', ['','home']) }}"> Home
                                </a></li>
                            <li class="breadcrumb-item"> Dashboard</li>
                        </ol>

                    </div>
                    @if(Session::has('success'))
                        <p class="alert alert-info">{{ Session::get('success') }}</p>
                    @endif
                    <div class="pt-3 pb-2 mb-3 border-bottom">
                        <h3>User Profile</h3>
                    </div>

                    <!-- Content Goes Here -->
                    <div class="row">
                        <div class="col">
                            <p>Welcome to your user profile.</p>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
@endsection



