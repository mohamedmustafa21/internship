<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\DB;
use App\Models\Intern;
use App\Models\User;
use App\Exports\InternExport;
use App\Exports\InternExportAccepted;
use App\Models\StudentSupervisor;
use App\Models\StudentProgramFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class InternController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function siteLogin()
    {
        return view('login');
    }

    public function siteLoginSubmit(Request $request)
    {
          return redirect()->route('site.login');

    }

    public function logout()
    {
        Session::forget('intern_id');
        Session::forget('id');
        return redirect('/')->with('success', 'Logged out successfully!');
    }

    public function dashboard()
    {
        $students = Intern::whereDate('created_at', '>=', '2025-01-01')
                          ->orderBy('created_at', 'desc')
                          ->paginate(25);

        return view('dashboard', [
            'students' => $students
        ]);
    }

    public function checkMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:interns,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Email already exists'], 422);
        }

        return response()->json(['message' => 'Email is available'], 200);
    }

    public function supervisorView()
    {
        if(session()->has('id')){
            $this->supervisorController = new SupervisorController();
            $user_id = session('id');
            $user = User::where('id',$user_id)->first();
            $supervisorData = $this->supervisorController->getAllInternsForThisSuperVisor($user_id);
            return view('supervisor', compact('user', 'supervisorData'));
        }
    }

    public function accept(Request $request, $id)
    {
        $intern = Intern::findOrFail($id);
        $intern->IsAccepted = $request->input('is_accepted') == 'true' ? true : false;
        $intern->save();

        return response()->json(['success' => 'true']);
    }

    public function showProfile($id)
    {
        $intern = Intern::findOrFail($id);

        $supervisorData = StudentSupervisor::where('intern_id',$id)->get('supervisor_id');
        $superId = $supervisorData[0]->supervisor_id;
        $super = User::where('id',$superId)->get();

        $feedback = StudentProgramFeedback::where('intern_id',$id)->get();
        return view('internevalform', compact('intern','feedback','super','supervisorData'));
    }

    public function exportInterns()
    {
        return Excel::download(new InternExport, 'ElSewedyInternship-2025.xlsx');
    }

    public function exportAcceptedInterns()
    {
        return Excel::download(new InternExportAccepted, 'Accepted Interns.xlsx');
    }

    public function secondRegistration()
    {
        return view('internevalform');
    }

    public function adminDashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('site.login');
        }
        $students = Intern::orderBy('id','desc')->paginate(25);
        return view('dashboard', compact('students'));
    }

    public function hrDashBoard()
    {
        $students = DB::table('interns')->get();
        return view('dashboard', ['students' => $students]);
    }

    /**
     * ✅ تعديل login بإضافة 2FA
     */
    public function processLogin(Request $request)
    {
        if (session()->has('intern_id')) {
            $internId = session('intern_id');
            $intern = Intern::where('id',$internId)->first();
            $internAssigned = DB::table('interns')
                                ->join('student_supervisor', 'interns.id', '=', 'student_supervisor.intern_id')
                                ->join('users', 'student_supervisor.supervisor_id', '=', 'users.id')
                                ->select('interns.IsAccepted as IsAccepted','interns.full_name','interns.preferred_industry', 'interns.email', 'users.name', 'users.email')
                                ->where('interns.id', $internId)
                                ->first();
            $supervisorData = StudentSupervisor::where('intern_id',$internId)->first();
            if ($supervisorData == '') {
                return 'fff';
            }
            $superId = $supervisorData->supervisor_id;
            $super = User::where('id',$superId)->get();
            if($intern->IsAccepted == true && $internAssigned) {
                $id = $intern->id;
                return $this->showProfile($id);
            } else {
                return view('internevalform', compact('intern','super'));
            }
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $email = $request->input('email');
            $password = $request->input('password');

            // 🔹 لو Admin من elsewedy
            if (strpos($email, '@elsewedy-ind.com') !== false) {
                $user = User::where('email', $email)->where('password', $password)->first();

                if ($user) {
                    // ✅ توليد كود 2FA
                    $user->generateTwoFactorCode();

                    // ✅ إرسال الكود على الإيميل
                    Mail::raw("Your 2FA code is: {$user->two_factor_code}", function ($message) use ($user) {
                        $message->to($user->email)
                                ->subject('Your Two-Factor Authentication Code');
                    });

                    // ✅ تخزين user_id مؤقتاً في السيشن
                    session()->put('2fa:user:id', $user->id);

                    // ✅ تحويل المستخدم لصفحة إدخال الكود
                    return redirect()->route('twoFactor.index');
                } else {
                    return redirect()->back()->with('error', 'Invalid email or password.');
                }
            }

            // 🔹 لو Intern
            $intern = Intern::where('email', $email)->where('password', $password)->first();
            if ($intern) {
                session()->put('intern_id', $intern->id);
                if ($intern->IsAccepted == true) {
                    $id = $intern->id;
                    return $this->showProfile($id);
                } else {
                    return view('internevalform', compact('intern'));
                }
            }

            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function showFeedbackForm(Request $request, $internId)
    {
        $intern = Intern::findOrFail($internId);
        $supervisorData = StudentSupervisor::where('intern_id',$internId)->get('supervisor_id');
        $superId = $supervisorData[0]->supervisor_id;
        $super = User::where('id',$superId)->first();

        return view('studentFeedback', compact('intern','super'));
    }

    public function storeFeedback(Request $request)
    {
        $feedback = new StudentProgramFeedback();
        $get_the_intern = Intern::where('id',$request->input('intern_id'))->first();

        $feedback->intern_id = $request->input('intern_id');
        $feedback->supervisor_id = 1;
        $feedback->intern_full_name = $request->input('full_name');
        $feedback->mobile_number = $request->input('mobile_number');
        $feedback->training_industry = $request->input('training_industry');
        $feedback->supervisor_full_name = $request->input('supervisor_full_name');
        $feedback->supervisor_title = $request->input('supervisor_title');
        $feedback->orientation_sufficient = $request->input('orientation_sufficient');
        $feedback->oversee_work = $request->input('oversee_work');
        $feedback->supervisor_available = $request->input('supervisor_available');
        $feedback->challenging_internship = $request->input('challenging_internship');
        $feedback->practical_skills = $request->input('practical_skills');
        $feedback->positive_work_environment = $request->input('positive_work_environment');
        $feedback->build_network = $request->input('build_network');
        $feedback->recommend_internship = $request->input('recommend_internship');
        $feedback->consider_working_organization= $request->input('consider_working_organization');
        $feedback->comments = $request->input('other_comments');

        $feedback->save();

        if($feedback->save()){
            $get_the_intern->feedback = 1;
            $get_the_intern->save();
            return redirect('login')->with('Sucess ', 'Thanks for your feedback. ');
        } else {
            return redirect()->back()->with('error', 'Incorrect values');
        }
    }
}
