@extends('layouts.app')
@section('title', 'EL Sewedy Internship')
@section('content')
<style>
    @font-face {
        font-family: 'HolidayFree';
        src: url('{{asset("assets/fonts/HolidayFree.otf")}}') format('opentype');
        font-weight: normal;
        font-style: normal;
    }
    .carousel-item .carousel-caption {
        width: 100% !important;
        text-align: center;
        background: transparent !important;
        left: 0;
        top: 20%;
        padding-top: 55px;
    }
    .carousel-item .carousel-caption img{
        height: auto;
        width: auto;
        object-fit: contain;
    }
    .Program-Purpose-list {
        color: #fff;
        font-size: 24px;
    }
    .home-article {
        background-color: #ccc;
    }
    .lists-container {
        display: flex;
        justify-content: space-between; /* Adjust this as needed */
        gap: 20px; /* Space between the lists */
    }
    .major-container {
        display: flex;
        flex-direction: column;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }
    .diversified-industries .col-md-4, .diversified-industries .col-md-8 {
        display: flex;
        flex-direction: column;
    }
    .home-article {
        display: flex;
        flex-direction: column;
        flex: 1;
    }
</style>
    <!-- Home Carousel -->
    {{-- <div id="home-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active mt-5">
                <img src="{{ asset('assets/imgs/hero2.jpg') }}" class="d-block object-fit-cover" alt="Slide 1">
            </div>
        </div>
        <a class="carousel-control-prev d-none" href="#home-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">
            </span>
        </a>
        <a class="carousel-control-next d-none" href="#home-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div> --}}
    <!-- Body Section -->



    {{-- Hero Sec --}}

   <div class="hero-section d-flex justify-content-center align-items-center flex-column text-center mb-5">
    <div>
        <h3 class="">Gen To Gen</h3>
    </div>
    <div>
        <h1 class="text-white">Internship Program 2025</h1>
    </div>
</div>

<style>
    .hero-section {
        width: 100%;
        height: 100vh;
        background-image: url("assets/imgs/finalhero.jpeg");
        background-size: cover;
        background-position: center center;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        padding-bottom: 90px;
        font-weight: 700;
    }

    .hero-section h1
     {
        color: white;
        background-color: #102036;
        padding: 25px;
        border-radius: 40px;
    }
    .hero-section h3{
        color: #102036;
        font-weight: 900;
        font-size: 44px !important;
    }
</style>




<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('assets/imgs/whoweare.png') }}" width="100%" alt="Image">
        </div>
        <div class="col-md-8">
            <div class="content" id="whoweare">
                <h1 class="text-center mb-4">
                    <img src="{{ asset('assets/imgs/icon.png') }}" height="35" alt="">
                    Who We Are
                </h1>
                <p>
                <strong>El Sewedy Industries Group</strong> was established by Mr. Ahmed Sadek El Sewedy in 1938 in Egypt and across the Middle East as one of the market leaders in multiple competitive industries.<br><br>
                Over the past 80 years, The Group has succeeded in influencing the local market in various operational scopes; Manufacturing, Industrial Sector, Building Materials, Retail and Real Estate Development.<br><br>

                </p>
            </div>
        </div>

        <div class="col-12 p-4">
             <div class="col-12 text-center p-2" style="background-color: #19176c">
                    <img src="{{ asset('assets/imgs/logos/00.png') }}" alt="Image">
                </div>
            <div class="row text-center p-4">
                 <div class="row ">
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/1.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/2.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/3.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/4.png" alt="">
                        </div>

                        {{-- END --}}



                    </div>
                    <div class="row ">
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/6.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/7.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/8.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/9.png" alt="">
                        </div>

                        {{-- END --}}

                         </div>
                    <div class="row ">
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/11.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/12.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/13.png" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/10.png" alt="">
                        </div>

                        {{-- END --}}

                         {{-- END --}}

                         </div>


                           <div class="row d-flex justify-content-center">

                        <div class="col-md-3">
                            <img src="assets/imgs/logoss/5.png" alt="">
                        </div>

                        {{-- END --}}

                         {{-- END --}}

                         </div>


            </div>
        </div>

        <div class="col-12">
            <h1 class="text-center mt-5 mb-4">
                <img src="{{ asset('assets/imgs/icon.png') }}" height="35" alt="">
                Program Purpose
            </h1>

            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('assets/imgs/02.png') }}" alt="">
                </div>
                <div class="col-md-7">
                    <strong>This program is offered by El Sewedy Industries to provide the opportunity for undergraduate students to explore real experience in diversified industries
                        </strong>
                    <ul>
                        <li>Capability building of Technical and practical skills</li>
                        <li>Identify career goals for future opportunities</li>
                        <li>Access to a variety of industries and departments</li>
                        <li>Build valuable connections with industry experts</li>
                    </ul>
                </div>







<div class="d-none d-md-block">


                <div class="col-12 text-center p-2" style="background-color: #19176c; border-radius: 15px;

                ">
                    <div class="row " style="padding: 10px; display: flex; align-items: center;">
                        <div class="col-sm-6 col-lg-3 text-center pt-2 pb-2 Program-Purpose-list">
                            Industrial Sector
                        </div>
                        <div class="col-sm-6 col-lg-3 text-center pt-2 pb-2 Program-Purpose-list">
                            Building Materials Sector
                        </div>
                        <div class="col-sm-6 col-lg-3 text-center pt-2 pb-2 Program-Purpose-list">
                            Real Estate Sector
                        </div>
                        <div class="col-sm-6 col-lg-3 text-center pt-2 pb-2 Program-Purpose-list">
                            Retail & Distribution Sector
                        </div>
                    </div>





                </div>
                 <div class="col-12" style="padding: 10px;">
                    <div class="row ">
                        @for($x=1;$x<5;$x++)
                            <div class="col-sm-6 col-lg-3 text-center pt-3 ">
                                <img src="{{ asset('assets/imgs/ProgramPurposeIcons0'.$x.'.png') }}" height="75" alt="Image">
                            </div>
                        @endfor
                    </div>
                </div>
</div>



<!-- نسخة الموبايل (كلمة + أيقونة جنبها) -->
<div class="col-12 d-block d-md-none text-center p-2 " style=" border-radius: 15px;">
    <div class="row" style="padding: 15px;">
        <div class="col-6 text-start d-flex align-items-center mb-3" style="background-color: #19176c; padding: 15px;">
            <img src="{{ asset('assets/imgs/ProgramPurposeIcons01.png') }}" height="30" class="me-2" alt="Icon">
            <span class="text-white">Industrial Sector</span>
        </div>
        <div class="col-6 text-start d-flex align-items-center mb-3" style="background-color: #19176c; padding: 15px;">
            <img src="{{ asset('assets/imgs/ProgramPurposeIcons02.png') }}" height="30" class="me-2" alt="Icon">
            <span class="text-white">Building Materials Sector</span>
        </div>
        <div class="col-6 text-start d-flex align-items-center mb-3" style="background-color: #19176c; padding: 15px;">
            <img src="{{ asset('assets/imgs/ProgramPurposeIcons03.png') }}" height="30" class="me-2" alt="Icon">
            <span class="text-white">Real Estate Sector</span>
        </div>
        <div class="col-6 text-start d-flex align-items-center mb-3" style="background-color: #19176c; padding: 15px;">
            <img src="{{ asset('assets/imgs/ProgramPurposeIcons04.png') }}" height="30" class="me-2" alt="Icon">
            <span class="text-white">Retail & Distribution Sector</span>
        </div>
    </div>
</div>






            </div>
        </div>




        <div class="row mt-5">
            <div class="col-md-5">
                <img src="{{ asset('assets/imgs/01.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <p>The internship will last up to <strong>one month</strong>, Intern will be involved in one of the following areas:</p>
                <ul>
                    <li>Stream 1 (Engineering): Manufacturing & Commercial</li>
                    <li>Stream 2 (Non-Engineering): Finance, Human Resources, Information Technology (ICT) , Health & Safety, Commercial, Marketing & Graphic Designing
</li>
                </ul>
                <p>Technology (ICT) , Health & Safety, Commercial, Marketing & Graphic Designing
Each applicant should choose one of the two streams in the following industries. Depending on his/her choice, the intern will be assigned to mentors accordingly.</p>
            </div>

            <div class="col-12 responsive-cover" style="height: 300px; width: 100%;
    background-image: url('{{ asset('assets/imgs/Coverrr.JPG') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 20px;">
</div>
<style>
    @media (max-width: 768px) {
        .responsive-cover {
            height: 150px !important; /* أو أي طول يناسبك */
        }
    }
</style>

        </div>


        <div class="row">
            <div class="col-12 text-center mt-5">
                <h3 class="fw-bold mt-2 mb-4">Reveal your potential by applying to one of these diversified industries</h3>
            </div>
           <div class="row diversified-industries">
    {{-- Start of standardized cards --}}
   @php
    $industries = [
        [
            'img' => '01.png',
            'title' => 'Lighting Fixtures',
            'company' => 'Egylux',
            'description' => 'Provides the latest lighting solutions for residential, industrial, commercial and outdoor purposes with a strong presence in the Egyptian Market and the MENA region.',
            'streams' => ['Manufacturing', 'Commercial'],
            'majors' => ['Electrical Engineering  is a must'],
        ],
        [
            'img' => '02.png',
            'title' => 'Sheet Metal Fabrication',
            'company' => 'Sheet Metal Fabrication (SMF)',
            'description' => 'SMF is the sole sourcing for several Market leaders in end-use industries of Cable Trays, Electric Panels, Lighting Fixtures & Die Casting.',
            'streams' => ['Manufacturing', 'Commercial'],
            'majors' => ['Electrical Engineering  is a must'],
        ],
        [
            'img' => '03.png',
            'title' => 'Electrical Panels',
            'company' => 'EMAS',
            'description' => 'is offering a comprehensive range includes low and medium voltage switchgears, package substations, BMS, SCADA, and energy systems, all designed to offer fully integrated electrical solutions.',
            'streams' => ['Manufacturing', 'Commercial'],
            'majors' => ['Electrical Engineering  is a must'],
        ],
        [
            'img' => '04.png',
            'title' => 'Steel Industry',
            'company' => 'ASF',
            'description' => 'offering a wide range of steel structure products, plate work, OHTT, telecommunication towers, poles, high masts, monopoles, grating and galvanization in the Middle East & Africa region.',
            'streams' => ['Manufacturing', 'Commercial'],
            'majors' => ['Civil/Mechanical Engineering is a must'],
        ],
        [
            'img' => '05.png',
            'title' => 'Cement Industry',
            'company' => 'Cement',
            'description' => 'Cement is a leading manufacturer in the Egyptian building materials industry. play an integral and prominent role in the local market.',
            'streams' => ['Manufacturing'],
            'majors' => ['Electrical/Mechanical Engineering', 'Faculty of Science- Chemistry Department'],
        ],
        [
            'img' => '06.png',
            'title' => 'Trading Sector',
            'company' => 'EL Sewedy Equipment &  Cables',
            'description' => "a leading company in Egypt's power, industrialization, and retail sectors. Additionally, it is a global authorized distributor for several brands, which complements their product ranges",
            'streams' => ['Commercial'],
            'majors' => ['Electrical / Design Engineering', 'Business Administration or relevant field'],
        ],
        [
            'img' => '07.png',
            'title' => 'Fashion Industry',
            'company' => 'ASTK',
            'description' => ' is your ultimate source for the latest fashion trends and eye-catching styles. Explore our carefully curated collection to find your perfect summer outfit and upgrade your wardrobe like a pro, all while staying within your budget.',
            'streams' => ['Graphic Design', 'Fashion Design'],
            'majors' => ['Applied Arts or any relevant'],
        ],
        [
            'img' => '08.png',
            'title' => 'Support Functions',
            'company' => '',
            'description' => 'in our group, we understand the importance of support functions in driving business success. Thats why we have established a solid infrastructure that enables our support functions to collaborate effectively with our operations, working together to achieve our goals of sustainable growth and business continuity',
            'streams' => ['Information & Technology', 'Finance', 'Human Resources', 'Health & Safety', 'Marketing', 'Graphic Design'],
            'majors' => ['Business Administration or relevant field', 'Fine Arts', 'English Commerce', 'Graphic Design', 'Computer Since','Computer Engineering', 'Safety Management or relevant field'],
            'wide' => true,
        ],
    ];
@endphp

@foreach ($industries as $industry)
    <div class="col-md-{{ $industry['wide'] ?? false ? '8' : '4' }} mb-3">
        <div class="home-article pb-3" style="background-color: #252e62 ; border-radius: 10px; color: white;">
            <img src="{{ asset('assets/imgs/articles/' . $industry['img']) }}"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px; width: 100%;" alt="">
            <div class="p-3">
                <h4 class="text-center p-2 fw-bold">{{ $industry['title'] }}</h4>

                @if(!empty($industry['company']))
                    <h5 class="p-2">Company profile:</h5>
                    <p class="p-2">
                        <strong>{{ $industry['company'] }}</strong> {{ $industry['description'] }}
                    </p>
                @else
                    <p class="p-2">{{ $industry['description'] }}</p>
                @endif

                @if (!empty($industry['wide']))
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="p-2">Technical Stream</h5>
                            <ul>
                                @foreach ($industry['streams'] as $stream)
                                    <li>{{ $stream }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="p-2">Student’s Major:</h5>
                            <ul>
                                @foreach ($industry['majors'] as $major)
                                    <li>{{ $major }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <h5 class="p-2">Technical Stream</h5>
                    <ul>
                        @foreach ($industry['streams'] as $stream)
                            <li>{{ $stream }}</li>
                        @endforeach
                    </ul>

                    <h5 class="p-2">Student’s Major:</h5>
                    <ul>
                        @foreach ($industry['majors'] as $major)
                            <li>{{ $major }}</li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
@endforeach


</div>

        </div>

        <div class="row mt-5 pt-5" id="canapplay">
            <div class="col-md-5 text-center pt-5">
                <img src="{{ asset('assets/imgs/who can applay.png') }}" class="p-5" style="max-width: 350px; " alt="Image">
            </div>
            <div class="col-md-7 pt-5">
                <div class="content" id="whoweare">
                    <ul>
                        <li>Class of 2024, 2025 & 2026 are only enrolled for the internship program </li>
                        <li>Student’s last year Grade with minimum Good (Minimum GPA is 2.0)</li>
                        <li>One month is the minimum period for the program enrollment</li>
                        <li>Extracurricular activities and previous internships are desirable</li>
                    </ul>
                </div>
            </div>
        </div>

        <style>
  @media (max-width: 768px) {
    .responsive-banner {
      height: 170px !important; /* ارتفاع أصغر للموبايل */
    }
  }
</style>

<div class="row" id="register">
  <div class="col-12 responsive-banner" style="height: 380px;
      background-image: url('{{ asset('assets/imgs/Baneer2.png') }}');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;">
  </div>
</div>


        <div class="row pt-5">
            <div class="col-md-4 text-center pt-5">
                <h2 class="pt-2 fw-bold">Selection process</h2>
                <img src="{{ asset('assets/imgs/logoss/10 (1).jpg') }}" class="img-fluid" style="max-height: 200px" alt="">
            </div>
            <div class="col-md-8 pt-5">
                <ul>
                    <li><strong>Online Application:</strong> First, an online application form should be filled in,  please follow the below link at Apply Now!</li>
                    <li><strong>Screening:</strong> All applications are screened by the HR Team</li>
                    <li><strong>Interview:</strong> Only semi-finalists will be invited to brief interviews with the Selection Panel interview. </li>
                    <li><strong>Internship Acceptance:</strong> Accepted students whom passed the previous step shall receive an e-mail/Call with their internship acceptance and program agenda.</li>
                </ul>
                <p class="pt-1">All interested students shall submit their application by the following Link before <strong>10 June 2025.</strong> </p>
            </div>
            <div class="col-12 mb-5"></div>
            <div class="col-md-4 text-center">
                <h5 class="pt-2 fw-bold">Application form</h5>
                <img src="{{ asset('assets/imgs/logoss/9 (1).jpg') }}" class="img-fluid" style="max-height: 200px" alt="">
            </div>
            <div class="col-md-8 pt-5">
                <div class="text-center">
                    <!--<a href="{{ route('register.index') }}" class="btn btn-primary" id="applyButton">Apply Now</a>-->
                    <br><br>
                    <span class="reveal">Gen to Gen</span>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .reveal{
        font-family: "HolidayFree", sans-serif;
    }
.button {
  display: inline-block;
  background-color: #252A68;
  color: #FFFFFF;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  width: 90%;
margin: 0 auto;
text-align: center;
}

.button:hover {
  background-color: #1E224F;
}


.separator {
    background-image: url('{{ asset("assets/img/selection.jpg") }}');
  background-size: contain;
  background-repeat: no-repeat;
  width: 100%;
  height: 800px;
}
.card {
    height: 400px;
    background-color: #0dbfd6!important;
}

.card-body .btn-primary {
    background-color: #140d45;
    float:right;
}
.carousel-caption{
    background-color: #e8ebe9a6;
    bottom: 12.25rem!important;
    right:50%!important;
    border-radius:29px;

}
.caption-title{
    font-size: 2.1rem;
    font-weight: 700;

    color: #140d45;
}
.caption-para{
    font-size: 2rem;
    color: #140d45;
}

.carousel-item img {
    height: 60vh;
    width: 100%;
    object-fit: cover;
}


/* Home page styles */
.container {
  display: flex;
  font-family: "DM Sans", sans-serif;

}

.content {
  flex: 1;
  font-size: 18px;
  margin-top: 10px;
  margin-bottom: 10px;
}

.image {
  margin-right: 20px;
}

@media (max-width: 767px) {
    .big-div {
    flex-direction: column;
  }

  .content {
    margin-top: 20px;
    margin-left: 0;
  }
  .container {
    flex-direction: column;
  }

  .image {
    margin: 0 auto;
    order: 2;
  }
}
.big-div {
  display: flex;
  padding: 8%;
  margin-top: 2%!important;

  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

}
.big-div:hover {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}

.title-div {
  flex: 1;
  display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.title {
  font-size: 24px;
  text-align:center
}

.content {
  flex: 1;
  margin-left: 20px;
}
.streams {
  display: flex;
  margin-top: 10px;
}

.stream {
  flex: 1;
}

.stream h4 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 5px;
}

.stream ul {
  list-style-type: disc;
  padding-left: 20px;
}

}


</style>
<script>
    function showSuccessAlert(type) {
  // Get the alert div
  const alertDiv = document.getElementById("alert");

  if(type == 'success'){
    // Create the success alert element
  const successAlert = document.createElement("div");
  successAlert.className = "alert alert-success";
  successAlert.role = "alert";

  // Add the message to the alert element
  const textNode = document.createTextNode(message);
  successAlert.appendChild(textNode);

  // Add the alert element to the alert div
  alertDiv.appendChild(successAlert);

  // Hide the alert after 3 seconds
  setTimeout(() => {
    successAlert.style.display = "none";
  }, 3000);
  }
  else{
    // Create the success alert element
  const errorAlter = document.createElement("div");
  errorAlter.className = "alert alert-danger";
  errorAlter.role = "alert";

  // Add the message to the alert element
  const textNode = document.createTextNode(message);
  errorAlter.appendChild(textNode);

  // Add the alert element to the alert div
  alertDiv.appendChild(errorAlter);

  // Hide the alert after 3 seconds
  setTimeout(() => {
    errorAlter.style.display = "none";
  }, 3000);
  }
}
</script>

@if (session('success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}'
            });
        });
    </script>
@endif
