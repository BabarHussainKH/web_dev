<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\exam_master;
use App\Models\question_master;
use App\Models\result;
use App\Models\User;
use App\Models\user_exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserDashBoardController extends Controller

{
    //student dashboard
    public function dashboard()
    {

        $data['portal_exams'] = exam_master::select(['exam_masters.*', 'categories.name as cat_name'])
            ->join('categories', 'exam_masters.category', '=', 'categories.id')
            ->orderBy('id', 'desc')->where('exam_masters.status', '1')->get()->toArray();
        return view('user.dashboard', $data);
    }


    //Exam page
    public function exam()
    {


        $student_info = user_exam::select(['user_exams.*', 'users.name', 'exam_masters.title', 'exam_masters.exam_date'])
            ->join('users', 'users.id', '=', 'user_exams.user_id')
            ->join('exam_masters', 'user_exams.exam_id', '=', 'exam_masters.id')->orderBy('user_exams.exam_id', 'desc')
            ->where('user_exams.user_id', Session::get('id'))
            ->where('user_exams.std_status', '1')
            ->get()->toArray();

        return view('user.exam', ['student_info' => $student_info]);
    }


    //join exam page
    public function join_exam($id)
    {

        $question = question_master::where('exam_id', $id)->get();

        $exam = exam_master::where('id', $id)->get()->first();
        return view('user.join_exam', ['question' => $question, 'exam' => $exam]);
    }



    //On submit
    public function submit_questions(Request $request)
    {


        $yes_ans = 0;
        $no_ans = 0;
        $data = $request->all();
        $result = array();
        for ($i = 1; $i <= $request->index; $i++) {

            if (isset($data['question' . $i])) {
                $q = question_master::where('id', $data['question' . $i])->get()->first();

                if ($q->ans == $data['ans' . $i]) {
                    $result[$data['question' . $i]] = 'YES';
                    $yes_ans++;
                } else {
                    $result[$data['question' . $i]] = 'NO';
                    $no_ans++;
                }
            }
        }

        $std_info = user_exam::where('user_id', Session::get('id'))->where('exam_id', $request->exam_id)->get()->first();
        $std_info->exam_joined = 1;
        $std_info->update();


        $res = new result();
        $res->exam_id = $request->exam_id;
        $res->user_id = Session::get('id');
        $res->yes_ans = $yes_ans;
        $res->no_ans = $no_ans;
        $res->result_json = json_encode($result);

        echo $res->save();
        return redirect(url('user/exam'));
    }



    //Applying for exam
    public function apply_exam($id)
    {

        Log::info("user".Session::get('id'));
        $checkuser = user_exam::where('user_id', Session::get('id'))->where('exam_id', $id)->get()->first();

        if ($checkuser) {
            $arr = array('status' => 'false', 'message' => 'Already applied, see your exam section');
        } else {
            $exam_user = new user_exam();

            $exam_user->user_id = Session::get('id');
            $exam_user->exam_id = $id;
            $exam_user->std_status = 1;
            $exam_user->exam_joined = 0;

            $exam_user->save();

            $arr = array('status' => 'true', 'message' => 'applied successfully', 'reload' => url('user/dashboard'));
        }

        echo json_encode($arr);
    }


    //View Result
    public function view_result($id)
    {

        $data['result_info'] = result::where('exam_id', $id)->where('user_id', Session::get('id'))->get()->first();

        $data['student_info'] = User::where('id', Session::get('id'))->get()->first();

        $data['exam_info'] = exam_master::where('id', $id)->get()->first();

        return view('user.view_result', $data);
    }


    //View answer
    public function view_answer($id)
    {

        $data['question'] = question_master::where('exam_id', $id)->get()->toArray();

        return view('user.view_amswer', $data);
    }
}
