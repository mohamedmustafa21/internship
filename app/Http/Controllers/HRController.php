<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use App\Models\Intern;
use App\Models\User;
use App\Models\StudentSupervisor;
use App\Models\SuperviseFeedbackStudent;
use App\Models\StudentProgramFeedback;
use App\Exports\MentorFeedbacksExport;
use App\Exports\StudentFeedbacksExport;
use App\Imports\UserImporter;
use Maatwebsite\Excel\Facades\Excel;
use DB;

use Illuminate\Support\Facades\Session;


class HRController extends Controller
{
    //
    public function assignPage()
    {
        $supervisors = User::where('type','supervisor')->get();
        $interns = Intern::where('IsAccepted', 1)->get();

        return view('hrAssigndashboard',compact('supervisors','interns'));
    }
    public function assign(Request $request)
        {
            // Get the supervisor
            $supervisor = User::where('id', $request->supervisor)
                            ->where('type', 'supervisor')
                            ->get();

            // Get the intern
            $intern = Intern::where('id', $request->intern)->get();

            // Attach the intern to the supervisor
            $studentSupervisor = new StudentSupervisor();
            $studentSupervisor->supervisor_id = $supervisor[0]->id;
            $studentSupervisor->intern_id = $intern[0]->id;
            $studentSupervisor->certificate_type = $request->certificate_type;
            $studentSupervisor->save();

            // Return a success response
            return redirect('/hr')->with('success', 'Intern assigned to supervisor successfully.');
            
        }


        public function addNewUserAdmin(Request $request)
                {
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = "12345";
                    $user->type = $request->type;
                    $user->industry = $request->industry;
                    $user->training_field = $request->training_field_assign;
                    $user->save();

                    return redirect()->back()->with('success', 'User added successfully!');
                }


        public function getUsersAndInterns(Request $request)
        {
            $industry = $request->input('industry');
            $training_field = $request->input('training_field');
            
            // Retrieve users with the specified industry
            $users = User::where(['industry'=> $industry, 'training_field'=>$training_field])->get();
            
            $words = explode(" ", $training_field);
            // Retrieve interns with the preferred industry matching users
            
            // $interns = Intern::where(['preferred_industry'=> $industry,'preferred_training_field' => $words[0],'IsAccepted'=>1])->get();
            $interns = DB::table('interns')
            ->where('preferred_industry', '=', $industry)
            ->where(function ($query) use ($words) {
                $query->where('preferred_training_field', 'like', '%' . $words[0] . '%');
                
                if (isset($words[1])) {
                    $query->orWhere('preferred_training_field', 'like', '%' . $words[0] . ' ' . $words[1] . '%');
                }
            })->where('IsAccepted','=',1)
            ->get();
            // Combine users and interns into a single array
            $results = $users->concat($interns);
            
            return response()->json([
                'data' => [
                    'users' => $users,
                    'interns' => $interns
                ]
            ]);
        }

public function getUserAndInternData()
{
    $studentSupervisors = StudentSupervisor::with('supervisor', 'intern')->get();
    
    $data = $studentSupervisors->map(function ($studentSupervisor) {
        return [
            
            'user_id' => $studentSupervisor->supervisor['id'],
            'user_name' => $studentSupervisor->supervisor['name'],
            'user_email' => $studentSupervisor->supervisor['email'],
            'user_industry' => $studentSupervisor->supervisor['industry'],
            'intern_id' => $studentSupervisor->intern['id'],
            'intern_full_name' => $studentSupervisor->intern['full_name'],
            'intern_email' => $studentSupervisor->intern['email'],
            'intern_industry' => $studentSupervisor->intern['preferred_industry'],
            'training_field' => $studentSupervisor->supervisor['training_field'],
            'round' => $studentSupervisor->intern['round'],
        ];
    });

    return $data;
}

public function showAssignedStudent()
{
    $data = $this->getUserAndInternData();

    return view('assignedstudents', compact('data'));
}

public function removeAssignedStudent($id)
{
    // Find the intern
    // Remove the associated row from the StudentSupervisor table
    StudentSupervisor::where('intern_id', $id)->delete();
    
    // Return a response indicating success
    return response()->json(['message' => 'Intern removed successfully']);
}


//remove student from system

public function removeStudent($id)
{
    // Find the intern
    // Remove the associated row from the StudentSupervisor table
    Intern::where('id', $id)->delete();
    
    // Return a response indicating success
    return response()->json(['message' => 'Intern removed successfully']);
}
public function removeSupervisors($id)
{
    // Find the intern
    // Remove the associated row from the StudentSupervisor table
    $user = User::where('id', $id)->delete();
    
    
    // Return a response indicating success
    return $user;
}



    public function getAllSupervisors(Request $request)
    {
        $supervisors = User::all();
        
        return view('allSupervisors',compact('supervisors'));
    }


    public function import(Request $request)
        {
            $file = $request->file('file');

            Excel::import(new UserImporter, $file);
            

            return redirect()->back()->with('success', 'Data imported successfully.');
        }
        //
    //mentor
    public function showMentorFeedbackOnStudent(Request $request)
    {
        //supervise_feedback_student
        $all_feedbacks = SuperviseFeedbackStudent::all();

        return view('mentoruserfeedback',compact('all_feedbacks'));
    }

    //export mentors feedback

    public function exportMentorFeedback()
    {
        return Excel::download(new MentorFeedbacksExport, 'MentorFeedbacks.xlsx');

    }

    public function exportStudentFeedback()
    {
        return Excel::download(new StudentFeedbacksExport, 'StudentFeedbacksExport.xlsx');

    }

    //student feedback
        public function showStudentFeedbackOnprogram(Request $request)
        {
            //supervise_feedback_student
            $all_student_feedbacks = StudentProgramFeedback::all();
    
            return view('studentuserfeedbacks',compact('all_student_feedbacks'));
        }
    
    public function saveRound(Request $request)
    {
        $round = $request->input('round');
        $id = $request->input('internId');
        

        // Update the "round" column in the "interns" table
        $add = Intern::where('id', $id)->update(['round' => $round]);
        
        if($add){
            return response()->json(['success' => true]);
        }
        else{
            return response()->json(['Error' => false]);
        }

        
    }

    
}
