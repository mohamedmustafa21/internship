<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" crossorigin="anonymous">
        <!-- Bootstrap 5 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
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
     <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="container pt-5">
            <div class="row justify-content-center pt-5">
                <div class="col-md-8 pt-5">
                    <strong>Dear <?php echo e(session()->get('intern_name') != '' ? session()->get('intern_name') : 'Applicant'); ?>,</strong><br>
                    <h3>Thank you for your application at Elsewedy Industries Group </h3>

                    Thank you for your interest in <strong>Elsewedy Industries Group's</strong> Summer Internship Program 2025.  We have received your application and appreciate the time and effort you invested in your submission.
                    <br><br>
                   Our team is currently reviewing all applications. If your qualifications match our requirements, we will reach out to you to schedule an interview.
                    <br>
                    We appreciate your enthusiasm and look forward to connecting with you soon!
                    <br>
                       <br>
                    <p class="fw-bold "style="" >
                        Human Resources Department
                    </p>


                    <img src="<?php echo e(asset('assets/img/logo-1.png')); ?>" width="220" alt="Logo">
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /home4/zhufapmy/public_html/internships/internshipPortal/resources/views/thankYou.blade.php ENDPATH**/ ?>