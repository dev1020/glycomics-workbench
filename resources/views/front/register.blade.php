@extends('front.layouts.simple')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('intlTelInput/intlTelInput.css') }}" />
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('intlTelInput/intlTelInputWithUtils.js') }}"></script>
@endsection
@section('content')
    <style>
        legend {
            margin-bottom: .9rem;
            border-bottom: 2px solid green;
        }
        sup{
            font-size:1.5em;
            top:0;
        }
        .phonewithcode{
            flex:5 1;
        }
        .phonewithcode .form-control{
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
        }
        .power-container {
            background-color: #2E424D;
            width: 100%;
            height: 7px;
            border-radius: 5px;
            margin-top: 5px;
        }

        .power-container #power-point {
            background-color: #D73F40;
            width: 1%;
            height: 100%;
            border-radius: 5px;
            transition: 0.5s;
        }
    </style>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-lg-start" >
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div class="card ">
                            <div class="card-header text-white bg-success">

                                Create an Account <span class="float-end">(* marked fields are necessary)</span>

                            </div>
                            <div class="card-body py-5 px-md-5">
                                @if($errors)
                                    <div class='error small text-danger'>{{$errors->first()}}</div>
                                @endif
                                <form onsubmit="return validateForm();" method="POST" action="{{ route('fregister') }}">
                                    @csrf
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">

                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label for="user_title" class="form-label">Title:</label>
                                                <select name="user_title" id="user_title" class="form-control form-select" required>

                                                    @foreach(["Mr." => "Mr.", "Mrs." => "Mrs.","Ms." => "Ms.","Dr." => "Dr.","Prof." => "Prof."] as $value => $label )
                                                        <option value="{{ $value }}" {{ @old('user_title') == $value ? "selected" : "" }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('user_title'))
                                                    <div class='error small text-danger'>{{$errors->first('user_title')}}</div>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userFirstName">First name<span class="text-danger"><sup>*</sup></span></label>
                                                <input type="text" name="user_first_name" id="userFirstName" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userFirstName">Middle name</label>
                                                <input type="text" name="user_middle_name" id="userMiddleName" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userLastName">Last name <span class="text-danger"><sup>*</sup></span></label>
                                                <input type="text" name="user_last_name" id="userLastName" class="form-control" required/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label for="gender" class="form-label">Gender: <span class="text-danger"><sup>*</sup></span></label>
                                                <select name="gender" class="form-control form-select" required>
                                                    <option value="" > Select </option>
                                                    <option value="male" > Male </option>
                                                    <option value="female" > Female </option>
                                                    <option value="neutral" > Neutral </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label for="gender" class="form-label">Education level:</label>
                                                <select name="education" class="form-control form-select" required>
                                                    <option value="" > Select </option>
                                                    <option value="School" >School</option>
                                                    <option value="Undergrad" >Undergrad</option>
                                                    <option value="Graduate" >Graduate</option>
                                                    <option value="PostGraduate" >PostGraduate</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <!-- Role input -->
                                            <div data-mdb-input-init class="form-outline">
                                                <label for="userRole" class="form-label">Select Role <span class="text-danger"><sup>*</sup></span></label>
                                                <select name="user_role" id="userRole" class="form-control form-select" required="">
                                                    <option value="" > Select </option>
                                                    <option value="student">Student</option>
                                                    <option value="researcher">Researcher</option>
                                                    <option value="educator">Educator</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <fieldset class="reset">
                                            <legend class="reset">Personal Details :</legend>
                                        </fieldset>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userLastName">Address Line 1</label>
                                                <input type="text" name="address_line_1" id="address_line_1" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userLastName">Address Line 2</label>
                                                <input type="text" name="address_line_2" id="address_line_2" class="form-control" required/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userLastName">City:</label>
                                                <input type="text" name="city" id="city" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userLastName">State:</label>
                                                <input type="text" name="state" id="state" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userLastName">Pin/ZipCode:</label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userLastName">Country:</label>
                                                <select name="country" class="form-control form-select" required>
                                                    <option value="" > Select </option>
                                                    @include('front._partials.country')
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="userPhone" style="width:100%">Phone<span class="text-danger"><sup>*</sup></span> </label>
                                            <div class="input-group">
                                                <input type="tel" name="user_phone" id="userPhone" class="form-control" style="" required/>

                                                <select name="user_phone_for" id="user_phone_for" class="form-control form-select " required="">

                                                    <option value="home">@Home</option>
                                                    <option value="work">@Work</option>
                                                    <option value="mobile">@Mobile</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="userPhone"  style="width:100%">Alt.Phone </label>
                                            <div class="input-group">
                                                <input type="tel" name="user_alt_phone" id="userAltPhone" class="form-control" />
                                                <select name="user_alt_phone_for" id="user_altphone_for" class="form-control form-select " required="">
                                                    <option value="home">@Home</option>
                                                    <option value="work">@Work</option>
                                                    <option value="mobile">@Mobile</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <!-- Email input -->
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userEmail">Email address <span class="text-danger"><sup>*</sup></span></label>
                                                <input type="email" name="email" id="userEmail" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <!-- Alt Email input -->
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userEmail">Alt. Email address</label>
                                                <input type="email" name="user_alt_email" id="userAltEmail" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <!-- Alt Email input -->
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="userEmail">Personal Website (If any)</label>
                                                <input type="text" name="user_personal_website" id="userWebsite" class="form-control" />

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <!-- Password input -->
                                        <div class="col-md-6">
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userPassword" style="width:100%">Password <span id="narrator" class="float-end"></span></label>
                                                <input type="password" name="user_password" id="userPassword" class="form-control" maxlength="12" minlength="8" onkeyup='check();'/>
                                                <div class="power-container"><div id="power-point"></div></div>

                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userConfirmPassword">Confirm Password</label>
                                                <input type="password" name="user_confirm_password" id="userConfirmPassword" class="form-control" onkeyup='check();'/>
                                                <div style="width:100%; text-align:end">
                                                    <span id="message" ></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card p-4 m-4">
                                                8-12 characters,<br> One upper, One lower, <br>One numerical, <br>One symbol (&, !, @, #, %)
                                            </div>
                                        </div>
                                        <!-- Confirm Password input -->
                                        <div class="col-md-6 mb-4">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <fieldset class="reset">
                                            <legend class="reset">Professional
                                                Details:</legend>
                                        </fieldset>
                                        <div class="col-md-3">
                                            <!-- Phone input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userPhone">Organization Name</label>
                                                <input type="text" name="user_organisation" id="userOrganisation" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- Phone input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userPhone">Job Title</label>
                                                <input type="text" name="user_job_title" id="userJobTitle" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- Phone input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userPhone">Department</label>
                                                <input type="text" name="user_department" id="userDepartment" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- Phone input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userPhone">Company Website</label>
                                                <input type="text" name="user_company_website" id="userCompanyWebsite" class="form-control" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="userPhone" style="width:100%">Student Of</label>
                                            <div class="input-group">
                                                <input type="tel" name="user_studentof" id="userStudentof" class="form-control" style="width:60%"/>

                                                <select name="user_studentof_type" id="userStudentofType" class="form-control form-select " required="">

                                                    <option value="school">@School</option>
                                                    <option value="college">@College</option>
                                                    <option value="university">@University</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="userPhone" style="width:100%">Alumni Of</label>
                                            <div class="input-group">
                                                <input type="tel" name="user_alumniof" id="userAlumniof" class="form-control" style="width:60%"/>

                                                <select name="user_alumniof_type" id="userAlumniofType" class="form-control form-select " required="">

                                                    <option value="school">@School</option>
                                                    <option value="college">@College</option>
                                                    <option value="university">@University</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <!-- Phone input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userPhone">Degree Obtained</label>
                                                <select name="user_degree" id="userDegree" class="form-control form-select" >
                                                    <option value="" > Select </option>
                                                    <option value="HS" >HS</option>
                                                    <option value="BS" >BS</option>
                                                    <option value="BA" >BA</option>
                                                    <option value="MS" >MS</option>
                                                    <option value="MA" >MA</option>
                                                    <option value="MBA" >MBA</option>
                                                    <option value="MBBS" >MBBS</option>
                                                    <option value="MD" >MD</option>
                                                    <option value="Ph.D" >PhD</option>
                                                    <option value="MDPhD" >MD,PhD</option>
                                                    <option value="D.Sc" >DSc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- Phone input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userMajor">Major</label>
                                                <input type="text" class="form-control" name="user_major">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- Phone input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="userYearPass">Year Passed</label>
                                                <input type="text" class="form-control" name="user_year_pass">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div data-mdb-input-init class="form-outline mb-4 d-grid gap-2 col-6 mx-auto">
                                        <input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success" value="SUBMIT">

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
        <script>
            let passwordMatched = false;
            let password = document.getElementById("userPassword");
            let power = document.getElementById("power-point");
            let narrator = document.getElementById("narrator");
            let lastPoint = 0;
            password.oninput = function () {
                let point = 0;
                let value = password.value;
                let widthPower =
                    ["1%", "25%", "50%", "75%", "100%"];
                let colorPower =
                    ["#D73F40", "#DC6551", "#F2B84F", "#BDE952", "#3ba62f"];
                let narratePower =
                    ["very weak","weak","good","strong","perfect"];

                if (value.length >= 8) {
                    let arrayTest =
                        [/[0-9]/, /[a-z]/, /[A-Z]/, /[^0-9a-zA-Z]/];
                    arrayTest.forEach((item) => {
                        if (item.test(value)) {
                            point += 1;
                        }
                    });
                }
                lastPoint = point;
                //console.log(lastPoint);
                power.style.width = widthPower[point];
                power.style.backgroundColor = colorPower[point];
                narrator.innerHTML = narratePower[point];
                narrator.style.color = colorPower[point];
            };

            var check = function() {
                if (document.getElementById('userPassword').value ==
                    document.getElementById('userConfirmPassword').value) {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Perfectly Matched';
                    passwordMatched = true;
                } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Oops Password mismatched';
                    passwordMatched = false;
                }
            }
            function validateForm()
            {

                if(passwordMatched!=true){
                    //console.log('Password not matched');
                    alert('Password not matched')
                    return false;
                }

                if(lastPoint<3){
                    //console.log('Password is not strong');
                    alert('Password is not strong')
                    return false;
                }
                return true;
            }

            // International code for the phone numbers
            const userPhone = document.querySelector("#userPhone");
            const userAltPhone = document.querySelector("#userAltPhone");
            window.intlTelInput(userPhone, {
                allowDropdown: true,

                containerClass: "phonewithcode",
                formatAsYouType: false,
                formatOnDisplay: false,
                hiddenInput: function(phone) {
                    return {
                        phone: "user_phone_withcode",
                    };
                },
                initialCountry: "us",
                separateDialCode: true,
            });
            window.intlTelInput(userAltPhone, {
                allowDropdown: true,
                autoPlaceholder: "off",
                containerClass: "phonewithcode",
                formatAsYouType: false,
                formatOnDisplay: false,
                hiddenInput: function(phone) {
                    return {
                        phone: "user_altphone_withcode",
                    };
                },
                initialCountry: "us",
                separateDialCode: true,
            });
        </script>
    </section>
    <!-- Section: Design Block -->
@endsection
