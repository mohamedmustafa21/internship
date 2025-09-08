<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RegistrationController extends Controller
{
    public function sendEmail($intern, $name)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = 'STARTTLS';
            $mail->Port = 587;

            $mail->setFrom('Internships@elsewedy-ind.com', 'Elsewedy Internships');

            $mail->addAddress($intern[0]->email, $name);
            $mail->Subject = 'Welcome To ElSewedy Internship program';
           $mail->isHTML(true);
    $mail->Body = '
<div class="col-md-8 pt-5">
    <strong>Dear ' . (!empty(session()->get("intern_name")) ? session()->get("intern_name") : 'Applicant') . ',</strong>
    <br>
    <h3>Thank you for your application at Elsewedy Industries Group</h3>
    Thank you for your interest in <strong>Elsewedy Industries Group\'s</strong> Summer Internship Program 2025. We have received your application and appreciate the time and effort you invested in your submission.
    <br><br>
    Our team is currently reviewing all applications. If your qualifications match our requirements, we will reach out to you to schedule an interview.
    <br>
    We appreciate your enthusiasm and look forward to connecting with you soon!
    <br><br>
    <p class="fw-bold">Human Resources Department</p>
    
</div>
';


            $mail->send();
            return 'Email sent successfully';
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
    }

    public function forgetPasswordPage(Request $request)
    {
        return view('forgetPass');
    }

    public function forgetPassword(Request $request)
    {
        $inputs = $request->all();
        $email = $inputs['email'];

        $user = (strpos($email, '@elsewedy-ind.com') !== false)
            ? User::where('email', $email)->get()
            : Intern::where('email', $email)->get();

        if ($user->count() > 0) {
            $name = $user[0]->name;

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'STARTTLS';
            $mail->Host = 'smtp.office365.com';
            $mail->Port = 587;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->setFrom('internships@elsewedy-ind.com', 'ElSewedy Internship');
            $mail->addAddress($user[0]->email, $name);
            $mail->Subject = 'Forget Password';
            $mail->Body = 'Your password is :' . $user[0]->password;

            if ($mail->send()) {
                return redirect()->back()->with('success', 'Email sent successfully');
            } else {
                return redirect()->back()->with('error', 'Email could not be sent: ' . $mail->ErrorInfo);
            }
        } else {
            return "Email not exists";
        }
    }

    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required|date',
            'mobile' => 'required',
            'email' => 'required|email|unique:interns,email',
            'city' => 'required',
            'address' => 'required',
            'university' => 'required',
            'bachelor_degree' => 'required',
            'graduation_year' => 'required',
            'major' => 'required',
            'preferred_industry' => 'required',
            'military_service_status' => 'required',
            'training_field' => 'required',
            'grade' => 'required',
            'grade_certificate' => 'required|file|mimes:pdf,jpeg,jpg',
            'student_id_card' => 'required|file|mimes:pdf,jpeg,jpg',
            'solidworks_rating' => 'nullable',
            'autocad_rating' => 'nullable',
            'intern_opinion' => 'required',
            'trainings' => 'required',
            'source' => 'required',
            'other' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $intern = new Intern();

        $intern->full_name = $request->input('name');
        $intern->birthdate = $request->input('birthdate');
        $intern->mobile = $request->input('mobile');
        $intern->email = $request->input('email');
        $intern->city = $request->input('city');
        $intern->address = $request->input('address');
        $intern->university = $request->input('university');
        $intern->other_university = $request->input('other_university');
        $intern->bachelor_degree = $request->input('bachelor_degree');
        $intern->other_bachelor_degree = $request->input('other_bachelor_degree');
        $intern->graduation_year = $request->input('graduation_year');
        $intern->major = $request->input('major');
        $intern->preferred_industry = $request->input('preferred_industry');
        $intern->preferred_training_field = $request->input('training_field');
        $intern->military_service_status = $request->input('military_service_status');
        $intern->grade = $request->input('grade');
        $intern->training_info = $request->input('trainings');
        $intern->intern_opinion = $request->input('intern_opinion');
        $intern->source = $request->input('source');
        $intern->other = $request->input('other');
        $intern->training_10th_of_Ramadan = $request->input('training_10th_of_Ramadan');
        $intern->solidworks_rating = $request->input('solidworks_rating');
        $intern->autocad_rating = $request->input('autocad_rating');
        $intern->training_fieldd = $request->input('training_fieldd');
        $intern->industry_first_choice = $request->input('industry_first_choice');
        $intern->industry_second_choice = $request->input('industry_second_choice');
        $intern->training_ain_sokhna = $request->input('training_ain_sokhna');

        $intern->referral_name = $request->input('referral');
        $intern->referral_text = $request->input('referral_text');
        $intern->referral_position = $request->input('referral_position');
        $intern->referral_company = $request->input('referral_company');
        $intern->referral_other = $request->input('referral_other');

        $intern->password = $request->input('mobile');

        if ($request->hasFile('grade_certificate')) {
            $gradeFileName = time() . '_grade.' . $request->grade_certificate->getClientOriginalExtension();
            $request->grade_certificate->move(public_path('assets'), $gradeFileName);
            $intern->grade_certificate = $gradeFileName;
        } else {
            return redirect()->back()->with('error', 'Grade certificate file not uploaded.');
        }

        if ($request->hasFile('student_id_card')) {
            $idCardFileName = time() . '_idcard.' . $request->student_id_card->getClientOriginalExtension();
            $request->student_id_card->move(public_path('assets'), $idCardFileName);
            $intern->student_id_card = $idCardFileName;
        } else {
            return redirect()->back()->with('error', 'Student ID card file not uploaded.');
        }

        if ($intern->save()) {
            session()->put('intern_id', $intern->id);
            session()->put('intern_name', $intern->full_name);

            $this->sendEmail([$intern], $intern->full_name);

            return redirect()->route('register.thankYou');
        } else {
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }

    public function thankYou()
    {
        return view('thankYou');
    }
}
