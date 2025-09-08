<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- خليك في النسخة دي فقط -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery and Bootstrap 5 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Internship Registration</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
 @include('layouts.header')

    <!-- add your navigation menu here -->
    <!-- Login Modal -->

<!-- Login Modal -->
{{-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('assets/img/logo-1.png') }}" style="display: block;width: 60%;margin: 0 auto;" height="80" alt="Logo">
      </div>
      <div class="modal-body">
        <form id="reg" method="POST" action="{{ route('processLogin') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">


                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="login-btn btn btn-primary" style="display:block;background-color:#1f1759;">Login</button>
        </form>

      </div>
    </div>
  </div>
</div> --}}
<div class="container" style="margin-top: 12%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('El-Sewedy Industries Internship Program 2025') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" id="form">
                        @csrf

                        <div class="form-group row">
                            <label id="namee" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label id="birthdate" for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}"   required>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  placeholder="01XXXXXXXXX" pattern="01[0-9]{9}" maxlength="11" required>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label id="" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="reg-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >
                                <span id="email-error" class="text-danger"></span>
                                <span id="email-available" class="text" style="color:green;"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     <div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
    <div class="col-md-6">
        <input type="text" id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" placeholder="Enter City" required>
        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="university" class="col-md-4 col-form-label text-md-right">{{ __('University') }}</label>
                            <div class="col-md-6">
                                <select id="university" class="form-control @error('university') is-invalid @enderror" name="university" required>
                                    <option value="">Select Universityy</option>
                                    <option value="Ain Shams University">Ain Shams University</option>
                                    <option value="Ahram Canadian University">Ahram Canadian University</option>
                                    <option value="Al-Azhar University">Al-Azhar University</option>
                                    <option value="AlAlamein International University">AlAlamein International University</option>
                                    <option value="Alexandria University">Alexandria University</option>
                                    <option value="Arab Academy for Science, Technology and Maritime Transport">Arab Academy for Science, Technology and Maritime Transport</option>
                                    <option value="Arab Open University">Arab Open University</option>
                                    <option value="Aswan University">Aswan University</option>
                                    <option value="Assiut University">Assiut University</option>
                                    <option value="Banha University">Banha University</option>
                                    <option value="Badr University In Assiut">Badr University In Assiut</option>
                                    <option value="Badr University In Cairo">Badr University In Cairo</option>
                                    <option value="Beni-Suef University">Beni-Suef University</option>
                                    <option value="British University in Egypt">British University in Egypt</option>
                                    <option value="Cairo University">Cairo University</option>
                                    <option value="Canadian International College">Canadian International College</option>
                                    <option value="Damietta University">Damietta University</option>
                                    <option value="Damanhour University">Damanhour University</option>
                                    <option value="Delta University for Science and Technology">Delta University for Science and Technology</option>
                                    <option value="Egypt-Japan University of Science and Technology">Egypt-Japan University of Science and Technology</option>
                                    <option value="Egyptian Chinese University">Egyptian Chinese University</option>
                                    <option value="Egyptian e-Learning University">Egyptian e-Learning University</option>
                                    <option value="Egyptian Russian University">Egyptian Russian University</option>
                                    <option value="Egypt University Of Informatics">Egypt University Of Informatics</option>
                                    <option value="El Shorouk Academy">El Shorouk Academy</option>
                                    <option value="European Universities in Egypt (University of London, University of Central Lancashire)">European Universities in Egypt (University of London, University of Central Lancashire)</option>
                                    <option value="Fayoum University">Fayoum University</option>
                                    <option value="French University of Egypt">French University of Egypt</option>
                                    <option value="Future University in Egypt">Future University in Egypt</option>
                                    <option value="Galala University">Galala University</option>
                                    <option value="German International University">German International University</option>
                                    <option value="German University in Cairo">German University in Cairo</option>
                                    <option value="Heliopolis University">Heliopolis University</option>
                                    <option value="Helwan University">Helwan University</option>
                                    <option value="Hertfordshire University In Egypt">Hertfordshire University In Egypt</option>
                                    <option value="King Salman International University">King Salman International University</option>
                                    <option value="Kafrelsheikh University">Kafrelsheikh University</option>
                                    <option value="Mansoura University">Mansoura University</option>
                                    <option value="Military Technical College">Military Technical College</option>
                                    <option value="Minia University">Minia University</option>
                                    <option value="Minufiya University">Minufiya University</option>
                                    <option value="Misr International University">Misr International University</option>
                                    <option value="Misr University for Science and Technology">Misr University for Science and Technology</option>
                                    <option value="Modern Sciences and Arts University">Modern Sciences and Arts University</option>
                                    <option value="MTI University">MTI University</option>
                                    <option value="Nahda University">Nahda University</option>
                                    <option value="Nile University">Nile University</option>
                                    <option value="New Giza University">New Giza University</option>
                                    <option value="New Mansoura University">New Mansoura University</option>
                                    <option value="New Valley University">New Valley University</option>
                                    <option value="October 6 University">October 6 University</option>
                                    <option value="Pharos University In Alexandria">Pharos University In Alexandria</option>
                                    <option value="Port Said University">Port Said University</option>
                                    <option value="Sadat Academy for Management Sciences">Sadat Academy for Management Sciences</option>
                                    <option value="Sinai University">Sinai University</option>
                                    <option value="South Valley University">South Valley University</option>
                                    <option value="Suez Canal University">Suez Canal University</option>
                                    <option value="Suez University">Suez University</option>
                                    <option value="Sohag University">Sohag University</option>
                                    <option value="Tanta University">Tanta University</option>
                                    <option value="The American University in Cairo">The American University in Cairo</option>
                                    <option value="University of Sadat City">University of Sadat City</option>
                                    <option value="Zagazig University">Zagazig University</option>
                                    <option value="Zewail City of Science, Technology and Innovation">Zewail City of Science, Technology and Innovation</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('university')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row hidden" id="other-university">
                            <label for="other_university" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <input type="text" id="other_university" class="form-control mt-2" name="other_university" placeholder="Please specify your university">
                            </div>
                        </div>


                       <div class="form-group row">
    <label for="bachelor_degree" class="col-md-4 col-form-label text-md-right">{{ __('Bachelor Degree') }}</label>
    <div class="col-md-6">
        <select id="bachelor_degree" class="form-control select2 @error('bachelor_degree') is-invalid @enderror" name="bachelor_degree" required>
            <option value="" selected disabled>Select Bachelor Degree</option>
            <option value="Bachelor of Business Administration (BBA)">Bachelor of Business Administration (BBA)</option>
            <option value="Bachelor of Commerce (B.Com)">Bachelor of Commerce (B.Com)</option>
            <option value="Bachelor of Science (B.Sc.)">Bachelor of Science (B.Sc.)</option>
            <option value="Bachelor of Computer Science (B.CompSc / B.Sc. CS)">Bachelor of Computer Science (B.CompSc / B.Sc. CS)</option>
            <option value="Bachelor of Information Technology (B.IT)">Bachelor of Information Technology (B.IT)</option>
            <option value="Bachelor of Software Engineering">Bachelor of Software Engineering</option>
            <option value="Bachelor of Engineering (B.Eng)">Bachelor of Engineering (B.Eng)</option>
            <option value="Bachelor of Arts (B.A.)">Bachelor of Arts (B.A.)</option>
            <option value="Bachelor of Psychology">Bachelor of Psychology</option>
            <option value="Bachelor of Political Science">Bachelor of Political Science</option>
            <option value="Bachelor of Sociology">Bachelor of Sociology</option>
            <option value="Bachelor of History">Bachelor of History</option>
            <option value="Bachelor of Philosophy">Bachelor of Philosophy</option>
            <option value="Bachelor of Social Work (BSW)">Bachelor of Social Work (BSW)</option>
            <option value="Bachelor of Laws (LLB)">Bachelor of Laws (LLB)</option>
            <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
            <option value="Bachelor of Fine Arts (BFA)">Bachelor of Fine Arts (BFA)</option>
            <option value="Bachelor of Design (B.Des)">Bachelor of Design (B.Des)</option>
            <option value="Bachelor of Journalism and Mass Communication (BJMC)">Bachelor of Journalism and Mass Communication (BJMC)</option>
            <option value="Bachelor of Economics">Bachelor of Economics</option>
            <option value="Other">Other</option>
        </select>
        @error('bachelor_degree')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                        <div class="form-group row hidden" id="other-bachelor_degree">
                            <label for="other_bachelor_degree" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <input type="text" id="other_bachelor_degree" class="form-control mt-2" name="other_bachelor_degree" placeholder="Please specify your Bachelor Degree">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="major" class="col-md-4 col-form-label text-md-right">{{ __('Major') }}</label>

                            <div class="col-md-6">
                                <input id="major" type="text" class="form-control @error('major') is-invalid @enderror" name="major" value="{{ old('major') }}" required>

                                @error('Major')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="graduation_year" class="col-md-4 col-form-label text-md-right">{{ __('Graduation Year') }}</label>
                            <div class="col-md-6">
                                <select id="graduation_year" class="form-control @error('graduation_year') is-invalid @enderror" name="graduation_year"  required>
                                    <option value="">-- Select Graduation Year --</option>
                                    <option value="2028"{{ old('graduation_year') == '2028' ? ' selected' : '' }}>Class of 2028</option>
                                    <option value="2027"{{ old('graduation_year') == '2027' ? ' selected' : '' }}>Class of 2027</option>
                                    <option value="2026"{{ old('graduation_year') == '2026' ? ' selected' : '' }}>Class of 2026</option>
                                    <option value="2025"{{ old('graduation_year') == '2025' ? ' selected' : '' }}>Class of 2025</option>
                                    <option value="2024"{{ old('graduation_year') == '2024' ? ' selected' : '' }}>Class of 2024</option>
                                    <option value="2023"{{ old('graduation_year') == '2023' ? ' selected' : '' }}>Class of 2023</option>
                                    <option value="2022"{{ old('graduation_year') == '2022' ? ' selected' : '' }}>Class of 2022</option>
                                    <option value="2021"{{ old('graduation_year') == '2021' ? ' selected' : '' }}>Class of 2021</option>
                                    <option value="2020"{{ old('graduation_year') == '2020' ? ' selected' : '' }}>Class of 2020</option>
                                    {{-- <option value="other"{{ old('graduation_year') && !in_array(old('graduation_year'), ['2024', '2025']) ? ' selected' : '' }}>Other</option> --}}
                                </select>

                                @error('graduation_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


<div class="form-group row">
    <label for="military_service_status" class="col-md-4 col-form-label text-md-right">{{ __('Military Service Status') }}</label>
    <div class="col-md-6">
        <select id="military_service_status" class="form-control @error('military_service_status') is-invalid @enderror" name="military_service_status" required>
            <option value="" selected disabled>-- Select Status --</option>
            <option value="Completed" {{ old('military_service_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            <option value="Exempted" {{ old('military_service_status') == 'Exempted' ? 'selected' : '' }}>Exempted</option>
            <option value="Deferred" {{ old('military_service_status') == 'Deferred' ? 'selected' : '' }}>Deferred</option>
            <option value="Not Applicable" {{ old('military_service_status') == 'Not Applicable' ? 'selected' : '' }}>Not Applicable</option>
        </select>
        @error('military_service_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>




                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Acumulative Grade') }}</label>

                            <div class="col-md-6">
                                <select id="grade" class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                                    <option value="">-- Select Grade --</option>
                                    <option value="Fair" {{ old('grade') == 'Fair' ? 'selected' : '' }}>Fair</option>
                                    <option value="Good" {{ old('grade') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Very Good" {{ old('grade') == 'Very Good' ? 'selected' : '' }}>Very Good</option>
                                    <option value="Excellent" {{ old('grade') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                </select>

                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Add error return -->
                        <div class="form-group row">
                            <label for="grade_certificate" class="col-md-4 col-form-label text-md-right">{{ __('Accumulative Grade Certificate') }}</label>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="file" accept=".pdf,.jpeg,.jpg" class="form-control" id="grade_certificate" name="grade_certificate" required>
                                    <span id="file-error" class="text-danger"></span>

                                </div>
                                @error('grade_certificate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-text text-muted">Upload a PDF, JPEG, or JPG file.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label id="student_id_card" for="student_id_card" class="col-md-4 col-form-label text-md-right">{{ __('Student ID Card') }}</label>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="file" accept=".pdf,.jpeg,.jpg" class="form-control" id="student_id_card" name="student_id_card" required>
                                    <span id="file-error" class="text-danger"></span>

                                </div>
                                @error('student_id_card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-text text-muted">Upload a PDF, JPEG, or JPG file.</span>
                            </div>
                        </div>



                       <!-- Question 1: Preferred Industry -->
<div class="form-group row">
    <label for="preferred_industry" class="col-md-4 col-form-label text-md-right">
        {{ __('Preferred Program') }}
    </label>
    <div class="col-md-6">
        <select id="preferred_industry" class="form-control @error('preferred_industry') is-invalid @enderror" name="preferred_industry" required>
            <option value="" disabled selected>Select an option</option>
            <option value="Engineering" {{ old('preferred_industry') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
            <option value="Non - Engineering" {{ old('preferred_industry') == 'Non - Engineering' ? 'selected' : '' }}>Non - Engineering</option>
        </select>
        @error('preferred_industry')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Question 2: Preferred Training Field    -->
<div class="form-group row" id="training_field_container">
    <label for="training_field" id="ques_Two" class="col-md-4 col-form-label text-md-right">
        {{ __('Preferred Training Field') }}
    </label>
    <div class="col-md-6">
        <select id="training_field" class="form-control @error('training_field') is-invalid @enderror" name="training_field">
            <option value="">Please answer the previous question first.</option>
        </select>
        @error('training_field')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Question 3: Preferred Industry (First Choice) -->
<div class="form-group row" id="industry_first_choice_container">
    <label for="industry_first_choice" id="industry_first_choice_label" class="col-md-4 col-form-label text-md-right">
        {{ __('Preferred Industry (First Choice)') }}
    </label>
    <div class="col-md-6">
        <select id="industry_first_choice" class="form-control @error('industry_first_choice') is-invalid @enderror" name="industry_first_choice">
            <option value="">Please select a preferred industry first</option>
        </select>
        @error('industry_first_choice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Question 4: Preferred Industry (Second Choice) -->
<div class="form-group row" id="industry_second_choice_container">
    <label for="industry_second_choice" id="industry_second_choice_label" class="col-md-4 col-form-label text-md-right">
        {{ __('Preferred Industry (Second Choice)') }}
    </label>
    <div class="col-md-6">
        <select id="industry_second_choice" class="form-control @error('industry_second_choice') is-invalid @enderror" name="industry_second_choice">
            <option value="">Please select your second preferred industry</option>
        </select>
        @error('industry_second_choice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!--Question 5: Preferred Training Fieldd -->
<div class="form-group row" id="training_fieldd_container">
    <label for="training_fieldd" class="col-md-4 col-form-label text-md-right">
        {{ __('Preferred Training Field') }}
    </label>
    <div class="col-md-6">
        <select id="training_fieldd" class="form-control @error('training_fieldd') is-invalid @enderror" name="training_fieldd" >
            <option value="" disabled selected>Select an option</option>
            <option value="Manufacturing (Engineering Background Only)" {{ old('training_fieldd') == 'Manufacturing (Engineering Background Only)' ? 'selected' : '' }}>
                Manufacturing (Engineering Background Only)
            </option>
            <option value="Commercial (Engineering Background Only)" {{ old('training_fieldd') == 'Commercial (Engineering Background Only)' ? 'selected' : '' }}>
                Commercial (Engineering Background Only)
            </option>
        </select>
        @error('training_fieldd')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<!--Question 6: solidworks_rating  -->

     <div class="form-group row" id="solidworks_rating" style="display:none;">
   <label for="solidworks_rating" class="col-md-4 col-form-label text-md-right">How would you rate yourself in SOLIDWORKS?</label>
    <div class="col-md-6">
   <select id="solidworks_rating" class="form-control @error('solidworks_rating') is-invalid @enderror" name="solidworks_rating">
    <option value="">-- Select Rating --</option>
       <option value="Advanced"{{ old('solidworks_rating') == 'Advanced' ? ' selected' : '' }}>Advanced</option>
          <option value="Upper-Intermediate"{{ old('solidworks_rating') == 'Upper-Intermediate' ? ' selected' : '' }}>Upper-Intermediate</option>
              <option value="Intermediate"{{ old('solidworks_rating') == 'Intermediate' ? ' selected' : '' }}>Intermediate</option>
            <option value="Beginner"{{ old('solidworks_rating') == 'Beginner' ? ' selected' : '' }}>Beginner</option>
         </select>
        @error('solidworks_rating')
       <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
     </span>
    @enderror
</div>
  </div>

<!--Question 7: autocad_rating  -->

                        <div class="form-group row" id="autocad_rating" style="display:none;">
                            <label for="autocad_rating" class="col-md-4 col-form-label text-md-right">How would you rate yourself in AutoCAD?</label>
                            <div class="col-md-6">
                                <select id="autocad_rating" class="form-control @error('autocad_rating') is-invalid @enderror" name="autocad_rating">
                                    <option value="">-- Select Rating --</option>
                                    <option value="Advanced"{{ old('autocad_rating') == 'Advanced' ? ' selected' : '' }}>Advanced</option>
                                    <option value="Upper-Intermediate"{{ old('autocad_rating') == 'Upper-Intermediate' ? ' selected' : '' }}>Upper-Intermediate</option>
                                    <option value="Intermediate"{{ old('autocad_rating') == 'Intermediate' ? ' selected' : '' }}>Intermediate</option>
                                    <option value="Beginner"{{ old('autocad_rating') == 'Beginner' ? ' selected' : '' }}>Beginner</option>
                                </select>
                                @error('autocad_rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


{{-- Question 8 (A) - 10th of Ramadan --}}
<div class="form-group row" id="training_10th_of_Ramadan" style="display:none;">
    <label for="training_of_Ramadan" class="col-md-4 col-form-label text-md-right">
        Some fields will be trained at the 10th of Ramadan based on Factory location, and transportation bus will be provided.
    </label>
    <div class="col-md-6">
        <select id="training_of_Ramadan" class="form-control @error('training_10th_of_Ramadan') is-invalid @enderror" name="training_10th_of_Ramadan">
            <option value="">-- Select --</option>
            <option value="I Agree"{{ old('training_10th_of_Ramadan') == 'I Agree' ? ' selected' : '' }}>I Agree</option>
            <option value="I Disagree"{{ old('training_10th_of_Ramadan') == 'I Disagree' ? ' selected' : '' }}>I Disagree</option>
        </select>
        @error('training_10th_of_Ramadan')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

{{-- Question 8 (B) - Ain Sokhna --}}

<div class="form-group row" id="training_ain_sokhna" style="display:none;">
    <label for="training_of_sokhna" class="col-md-4 col-form-label text-md-right">
        Some fields will be trained at Ain Sokhna based on Factory location, and transportation bus will be provided.
    </label>
    <div class="col-md-6">
        <select id="training_of_sokhna" class="form-control @error('training_ain_sokhna') is-invalid @enderror" name="training_ain_sokhna">
            <option value="">-- Select --</option>
            <option value="I Agree"{{ old('training_ain_sokhna') == 'I Agree' ? ' selected' : '' }}>I Agree</option>
            <option value="I Disagree"{{ old('training_ain_sokhna') == 'I Disagree' ? ' selected' : '' }}>I Disagree</option>
        </select>
        @error('training_ain_sokhna')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>









                        <div class="form-group row">
                            <label for="trainings" class="col-md-4 col-form-label">{{ __('List any relevant trainings you have completed. Include the name, duration, and institution/organization (if applicable).') }}</label>

                            <div class="col-md-6">
                                <textarea id="trainings" class="form-control @error('trainings') is-invalid @enderror" name="trainings" rows="5" required>{{ old('trainings') }}</textarea>

                                @error('trainings')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="intern_opinion" class="col-md-4 col-form-label text-md-right" >What makes you a good candidate?</label>
                            <div class="col-md-6">
                                <textarea id="intern_opinion" class="form-control" name="intern_opinion" rows="4" required>{{ old('intern_opinion') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="source" class="col-md-4 col-form-label text-md-right">{{ __('How did you know about the Internship?') }}</label>
                            <div class="col-md-6">
                                <select id="source" class="form-control @error('source') is-invalid @enderror" name="source" required>
                                    <option value="">--Select--</option>
                                    <option value="Company Website">Company's Website</option>
                                    <option value="Linkedin">LinkedIn</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('source')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div id="referral-container" class="mt-3 d-none">

                                <input id="referralhidden" type="hidden" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ old('referral') }}">

                                    <label for="referral" class="form-label">{{ __('Referral Name') }}</label>
                                    <input id="referral" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral_text" value="{{ old('referral') }}">
                                    @error('referral')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="referral_position" class="form-label">{{ __('Referral Position') }}</label>
                                    <input id="referral_position" type="text" class="form-control @error('referral_position') is-invalid @enderror" name="referral_position" value="{{ old('referral_position') }}">
                                    @error('referral_position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="referral_company" class="form-label">{{ __('Referral Company') }}</label>
                                    <input id="referral_company" type="text" class="form-control @error('referral_company') is-invalid @enderror" name="referral_company" value="{{ old('referral_company') }}">
                                    @error('referral_company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div id="other-container" class="mt-3 d-none">
                                    <label for="other" class="form-label">{{ __('Other') }}</label>
                                    <input id="other" type="text" class="form-control @error('other') is-invalid @enderror" name="referral_other" value="{{ old('other') }}">
                                    @error('other')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-danger">
                            Declaration: I hereby declare that the information provided above is true to the best of my knowledge. I understand that any false information may result in the rejection of my application.
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="register-btn btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    /* Custom styles for invalid-feedback */
.invalid-feedback {
  color: red;
  font-size: 14px;
}
 #training_fieldd_container {
        display: none;
    }

.error {
  border-color: red;
}

/* Optionally, you can style the error message container as well */
.error-message {
  margin-top: 5px;
  font-size: 14px;
  color: red;
}
    .custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Choose file';
  display: inline-block;
  background: #007bff;
  border: none;
  color: #fff;
  padding: 8px 20px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  cursor: pointer;
  margin-right: 10px;
}
.custom-file-input:hover::before {
  background-color: #0069d9;
}
.custom-file-input:active::before {
  background-color: #0062cc;
}
.custom-file-input:focus::before {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.custom-file-label {
  margin-left: 10px;
}

    .register-btn{
        margin-top: 57px;
        float: right;
        display: block;
        width: 55%;
        height: 54px;
        background-color: #1f1759!important;
        font-size: 22px;
    }
    .card-header{
        display: block;
        text-align: center;
        font-size: 32px;
        color: #2a19a4!important;
        font-weight: 700;
    }
    .form-group{
        margin-bottom: 15px;
    }
    .col-form-label{
        color: #2a19a4!important;
        font-weight:700!important;
    }

    .navbar-nav li a {
    color: #fff;
    font-weight: bold;
}

    .login-btn{
        background-color: #1f1759;
        margin-top: 20px;
        width: 80%;
        height: 57px;
        display: block;
        margin: 17px auto;
    }
</style>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        var loginBtn = document.querySelector('.navbar .btn-outline-light');
        loginBtn.addEventListener('click', function() {
            $('#loginModal').modal('show');
        });
    </script>
<script>

    $(document).on('ready',function(){
        console.log("sss");
    });
    // document.addEventListener("DOMContentLoaded", function() {
    //     var sourceSelect = document.getElementById("source");
    //     var referralContainer = document.getElementById("referral-container");
    //     var otherContainer = document.getElementById("other-container");

    //     sourceSelect.addEventListener("change", function() {
    //         if (sourceSelect.value === "Referral") {
    //             referralContainer.classList.remove("d-none");
    //             otherContainer.classList.add("d-none");
    //         } else if (sourceSelect.value === "Other") {
    //             referralContainer.classList.add("d-none");
    //             otherContainer.classList.remove("d-none");
    //         } else {
    //             referralContainer.classList.add("d-none");
    //             otherContainer.classList.add("d-none");
    //         }
    //     });
    // });

    $(document).ready(function () {
    let emailTimer;

    // Email validation and availability check
    $('#reg-email').on('input', function () {
        clearTimeout(emailTimer);
        const email = $(this).val();

        if (!isValidEmail(email)) {
            $('#email-available').text('');
            $('#email-error').text('Please enter a valid email address.');
            return;
        }

        emailTimer = setTimeout(function () {
            $.ajax({
                url: '{{ route('check.email') }}',
                method: 'GET',
                data: { email: email },
                success: function (response) {
                    $('#email-available').text(response.message);
                    $('#email-error').text('');
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    var message = JSON.parse(xhr.responseText).message;
                    $('#email-error').text(message);
                    $('#email-available').text('');
                    console.log(message);
                }
            });
        }, 500); // نص ثانية بعد التوقف عن الكتابة
    });

    function isValidEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Grade certificate file validation
    $('#grade_certificate').change(function () {
        var file = $(this).prop('files')[0];
        if (file && !isAcceptedFileType(file)) {
            $('#file-error').text('Invalid file type. Please upload a valid file.');
        } else {
            $('#file-error').empty();
        }
    });

    function isAcceptedFileType(file) {
        var acceptedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        return acceptedTypes.includes(file.type);
    }

    // Referral fields logic
    $('#source').change(function () {
        var selectedOption = $(this).val();
        if (selectedOption === 'Referral') {
            $('#referral-container').removeClass('d-none');
            $('#other-container').addClass('d-none');
        } else if (selectedOption === 'Other') {
            $('#other-container').removeClass('d-none');
            $('#referral-container').addClass('d-none');
        } else {
            $('#referral-container').addClass('d-none');
            $('#other-container').addClass('d-none');
        }
    });

    $('#referral, #referral_position, #referral_company').blur(function () {
        var source = $('#source').val();
        if (source === 'Referral') {
            var referralName = $('#referral').val();
            var referralPosition = $('#referral_position').val();
            var referralCompany = $('#referral_company').val();
            var fullName = referralName + ' | ' + referralPosition + ' | ' + referralCompany;
            $('#referralhidden').val(fullName);
        }
    });
});


</script>
<script>
    document.getElementById('university').addEventListener('change', function() {
        var otherInput = document.getElementById('other-university');
        if (this.value === 'Other') {
            otherInput.classList.remove('hidden');
        } else {
            otherInput.classList.add('hidden');
        }
    });
    document.getElementById('bachelor_degree').addEventListener('change', function() {
        var otherInput = document.getElementById('other-bachelor_degree');
        if (this.value === 'Other') {
            otherInput.classList.remove('hidden');
        } else {
            otherInput.classList.add('hidden');
        }
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const industrySelect = document.getElementById("preferred_industry");
    const trainingField = document.getElementById("training_field");
    const trainingFieldContainer = document.getElementById("training_field_container");
    const quesTwo = document.getElementById("ques_Two");

    const firstChoiceContainer = document.getElementById("industry_first_choice_container");
    const secondChoiceContainer = document.getElementById("industry_second_choice_container");
    const trainingFielddContainer = document.getElementById("training_fieldd_container");
    const trainingFieldd = document.getElementById("training_fieldd");

    const solidworksRatingContainer = document.getElementById("solidworks_rating");
    const autocadRatingContainer = document.getElementById("autocad_rating");

    const ramadanContainer = document.getElementById("training_10th_of_Ramadan");
    const sokhnaContainer = document.getElementById("training_ain_sokhna");

    const form = document.querySelector("form");

    // Hide all containers on load
    trainingFieldContainer.style.display = "none";
    firstChoiceContainer.style.display = "none";
    secondChoiceContainer.style.display = "none";
    trainingFielddContainer.style.display = "none";
    solidworksRatingContainer.style.display = "none";
    autocadRatingContainer.style.display = "none";
    ramadanContainer.style.display = "none";
    sokhnaContainer.style.display = "none";

    const trainingOptions = {
        "Engineering": ["Electrical Engineering", "Mechanical Engineering", "Civil Engineering", "Chemical Engineering", "Industrial Engineering"],
        "Non - Engineering": ["Human Resources", "Finance", "Information Technology", "Graphic Design", "Marketing", "Health & Safety"],
        default: ["Human Resources", "Health and Safety", "Finance", "Information Technology"]
    };

    const industryOptions = {
        "Electrical Engineering": ["Lighting Fixtures Industry", "Electromechanical Industry", "Electrical Panels Industry", "Cement Industry"],
        "Mechanical Engineering": ["Lighting Fixtures Industry", "Sheet Metal Fabrication", "Steel Fabrications Industry", "Cement Industry"],
        "Civil Engineering": ["Steel Fabrications Industry"],
        "Chemical Engineering": ["Cement Industry"],
        "Industrial Engineering": ["Cement Industry"],
    };

    const hideSecondChoiceFields = ["Chemical Engineering", "Industrial Engineering", "Civil Engineering"];

    function updateTrainingFields() {
        const value = industrySelect.value;
        const fields = trainingOptions[value] || trainingOptions.default;

        trainingFieldContainer.style.display = "flex";
        firstChoiceContainer.style.display = "none";
        secondChoiceContainer.style.display = "none";
        trainingFielddContainer.style.display = "none";
        solidworksRatingContainer.style.display = "none";
        autocadRatingContainer.style.display = "none";
        ramadanContainer.style.display = "none";
        sokhnaContainer.style.display = "none";

        trainingField.innerHTML = `<option value="">Select Preferred ${value.includes("Non - Engineering") ? "Technical Stream" : "Engineering Field"}</option>`;
        quesTwo.innerHTML = trainingField.options[0].text;

        fields.forEach(field => {
            const opt = new Option(field, field);
            trainingField.appendChild(opt);
        });

        document.getElementById("industry_first_choice").innerHTML = '<option value="">Please select a preferred industry first</option>';
        document.getElementById("industry_second_choice").innerHTML = '<option value="">Please select your second preferred industry</option>';
    }

    function updateIndustryChoices() {
        const selectedTrainingField = trainingField.value;
        const isEngineering = industrySelect.value === "Engineering";

        const firstChoiceSelect = document.getElementById("industry_first_choice");
        const secondChoiceSelect = document.getElementById("industry_second_choice");

        firstChoiceSelect.innerHTML = '<option value="">Please select a preferred industry first</option>';
        secondChoiceSelect.innerHTML = '<option value="">Please select your second preferred industry</option>';

        if (selectedTrainingField) {
            if (isEngineering) {
                trainingFielddContainer.style.display = "flex";
                updateTrainingFielddOptions(selectedTrainingField);
                firstChoiceContainer.style.display = "flex";
                checkSecondChoiceVisibility();
            }

            solidworksRatingContainer.style.display = selectedTrainingField === "Mechanical Engineering" ? "flex" : "none";

            if (["Electrical Engineering", "Mechanical Engineering", "Civil Engineering"].includes(selectedTrainingField)) {
                autocadRatingContainer.style.display = "flex";
            } else {
                autocadRatingContainer.style.display = "none";
            }

            if (industryOptions[selectedTrainingField]) {
                industryOptions[selectedTrainingField].forEach(industry => {
                    firstChoiceSelect.appendChild(new Option(industry, industry));
                    secondChoiceSelect.appendChild(new Option(industry, industry));
                });
            }
        } else {
            firstChoiceContainer.style.display = "none";
            secondChoiceContainer.style.display = "none";
            trainingFielddContainer.style.display = "none";
            solidworksRatingContainer.style.display = "none";
            autocadRatingContainer.style.display = "none";
            ramadanContainer.style.display = "none";
            sokhnaContainer.style.display = "none";
        }
    }

    function updateTrainingFielddOptions(selectedTrainingField) {
        trainingFieldd.innerHTML = '<option value="" disabled selected>Select an option</option>';

        if (["Chemical Engineering", "Industrial Engineering"].includes(selectedTrainingField)) {
            const opt = new Option("Manufacturing (Engineering Background Only)", "Manufacturing (Engineering Background Only)");
            trainingFieldd.appendChild(opt);
        } else {
            const options = [
                "Manufacturing (Engineering Background Only)",
                "Commercial (Engineering Background Only)"
            ];
            options.forEach(option => {
                trainingFieldd.appendChild(new Option(option, option));
            });
        }
    }

    function checkSecondChoiceVisibility() {
        const selectedTrainingField = trainingField.value;
        if (!hideSecondChoiceFields.includes(selectedTrainingField)) {
            secondChoiceContainer.style.display = "flex";
        } else {
            secondChoiceContainer.style.display = "none";
        }
    }

    document.getElementById("industry_first_choice").addEventListener("change", function () {
        const value = this.value;

        ramadanContainer.style.display = "none";
        sokhnaContainer.style.display = "none";

        if (["Lighting Fixtures Industry", "Electrical Panels Industry", "Electromechanical Industry", "Steel Fabrications Industry"].includes(value)) {
            ramadanContainer.style.display = "flex";
        } else if (value === "Cement Industry") {
            sokhnaContainer.style.display = "flex";
        }
    });

    industrySelect.addEventListener("change", () => {
        updateTrainingFields();
        trainingField.value = "";
        trainingFieldContainer.style.display = "flex";
        firstChoiceContainer.style.display = "none";
        secondChoiceContainer.style.display = "none";
        trainingFielddContainer.style.display = "none";
        solidworksRatingContainer.style.display = "none";
        autocadRatingContainer.style.display = "none";
        ramadanContainer.style.display = "none";
        sokhnaContainer.style.display = "none";
    });

    trainingField.addEventListener("change", () => {
        updateIndustryChoices();
    });

    // ✅ Prevent submission if any visible required field is empty
form.addEventListener("submit", function (event) {
    event.preventDefault();

    let requiredFields;

    if (industrySelect.value === "Non - Engineering") {
        requiredFields = [trainingField,


            document.getElementById("training_field"),


    ];
    } else if (industrySelect.value === "Engineering") {
    if (training_field.value === "Civil Engineering" || training_field.value === "Industrial Engineering" ||training_field.value === "Chemical Engineering" ) {
        // لو الشرط الإضافي اتحقق
        requiredFields = [
            trainingField,
            document.getElementById("preferred_industry"),
            document.getElementById("industry_first_choice"),

            trainingFieldd
        ];
    } else {
        // لو الشرط الإضافي متحققش - ممكن تحط قيم مختلفة أو تسيبها فاضية مثلاً
        requiredFields = [
            trainingField,
            document.getElementById("preferred_industry"),
            document.getElementById("industry_first_choice"),
            document.getElementById("industry_second_choice"),
            trainingFieldd
        ];
    }
} else {
        requiredFields = [];
    }

for (let field of requiredFields) {
    if (!field.value) {
        let fieldName = field.getAttribute("name") || "Required Field";
        console.log(field);
        Swal.fire({
            icon: 'error',
            title: 'Missing Required Field',
            text: `Please complete "${fieldName}"`,
            confirmButtonText: 'OK'
        });
        field.focus();
        return;
    }
}


    form.submit();
});



















});
</script>




{{--
@if (session('error'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}'
            });
        });
    </script>
@endif --}}

