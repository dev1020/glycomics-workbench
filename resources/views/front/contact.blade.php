<?= $hfhfh;?>

@extends('front.layouts.simple')
@section('title')
    Contact
@endsection
@section('content')
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-lg-start">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <h2>Visit Us</h2>

                        <div class="divider half-margins"><!-- divider -->
                            <i class="fa fa-star"></i>
                        </div>


                        <strong><i class="fa fa-map-marker"></i> At any of the following Places:</strong>
                        <ul style="list-style: none;  margin: 10px 0px;">
                            <li>CHEYENNE, WY 82001</li>
                            <li>SAN DIEGO, CA 92130</li>
                            <li>PALO ALTO, CA 94306</li>
                        </ul>
                        <ul style="list-style: none;  margin: 10px 0px;padding: 0">
                            <li><strong><i class="fa fa-phone"></i> Phone:</strong> (001) 858 395 3287</li>
                            <li><strong><i class="fa fa-fax"></i> Fax:</strong> (001) 858 261 0065</li>
                            <li><strong><i class="fa fa-envelope"></i> Email:</strong>
                                <a href="mailto:contact@dattaconsultinggroup.com" class="black">contact@dattaconsultinggroup.com</a>
                            </li>
                        </ul>

                        <div class="divider half-margins"><!-- divider -->
                            <i class="fa fa-star"></i>
                        </div>

                        <h4 class="font300">Business Hours</h4>
                        <p>
                            <span class="block"><strong>Monday - Saturday:</strong> By Appointment</span>
                        </p>

                    </div>

                    <div class="col-lg-7 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form action="{{ route('fcontactform') }}" method="POST">
                                    @csrf
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userFullName">Full Name</label>
                                                <input type="text" name="full_name" id="userFullName"
                                                       class="form-control"/>

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userPhone">Phone</label>
                                                <input type="text" name="contact" id="userPhone"
                                                       class="form-control"/>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="userEmail">Email address</label>
                                        <input type="email" name="email" id="userEmail" class="form-control"/>

                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject"
                                               class="form-control"/>

                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="message">Message (2000 words max.)</label>
                                        <textarea name="message" rows="8" maxlength="2000" id="message" class="form-control"></textarea>

                                    </div>
                                    @if($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                    @endif
                                    <!-- Submit button -->
                                    <div data-mdb-input-init class="form-outline mb-4 d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success ">
                                            Send
                                        </button>
                                    </div>

                                   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
@endsection
