<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\exam_master;
use App\Models\question_master;
use App\Models\result;
use App\Models\User;
use App\Models\user_exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminDashBoardController extends Controller
{
    public function dashboard()
    {

        $user_count = User::where('user_role','user')->get()->count();
        $exam_count = exam_master::get()->count();
        $admin_count = User::where('user_role','admin')->get()->count();
        $categories = category::get()->count();
        return view('admin.dashboard', ['student' => $user_count, 'exam' => $exam_count, 'admin' => $admin_count, 'categories' => $categories]);
    }
    public function exam_category()
    {

        $data['category'] = category::get()->toArray();
        return view('admin/dashboard/exam_category', $data);
    }



    //Adding new exam categories
    public function add_new_category(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        } else {

            $cat = new category();
            $cat->name = $request->name;
            $cat->status = 1;
            $cat->save();
            $arr = array('status' => 'true', 'message' => 'Success', 'reload' => url('admin/dashboard/exam_category'));
        }
        echo json_encode($arr);
    }





    //Deleting the categories
    public function delete_category($id)
    {

        $cat = category::where('id', $id)->get()->first();
        $cat->delete();
        // return redirect(url('admin/dashboard/exam_category'));
        return redirect(url('admin/dashboard/exam_category'));

    }


    //Editing the categories
    public function edit_category($id)
    {
        $category = category::where('id', $id)->get()->first();
        return view('admin.dashboard.edit_category', ['category' => $category]);
    }


    //Editing the categories
    public function edit_new_category(Request $request)
    {
        $cat = category::where('id', $request->id)->get()->first();
        $cat->name = $request->name;
        $cat->update();
        echo json_encode(array('status' => 'true', 'message' => 'updated successfully', 'reload' => url('admin/dashboard/exam_category')));
    }



    //Editing categories status
    public function category_status($id)
    {
        $cat = category::where('id', $id)->get()->first();

        if ($cat->status == 1)
            $status = 0;
        else
            $status = 1;

        $cat1 = category::where('id', $id)->get()->first();
        $cat1->status = $status;
        $cat1->update();
    }




    //Manage exam page
    public function manage_exam()
    {
        $data['category'] = category::where('status', '1')->get()->toArray();
        $data['exams'] = exam_master::select(['exam_masters.*', 'categories.name as cat_name'])->join('categories', 'exam_masters.category', '=', 'categories.id')->get()->toArray();
        return view('admin/dashboard/manage_exam', $data);
    }



    //Adding new exam page
    public function add_new_exam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required', 'exam_date' => 'required', 'exam_category' => 'required',
            'exam_duration' => 'required'
        ]);

        if ($validator->fails()) {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        } else {

            $exam = new exam_master();
            $exam->title = $request->title;
            $exam->exam_date = $request->exam_date;
            $exam->exam_duration = $request->exam_duration;
            $exam->category = $request->exam_category;
            $exam->status = 1;
            $exam->save();

            $arr = array('status' => 'true', 'message' => 'exam added successfully', 'reload' => url('admin/dashboard/manage_exam'));
        }

        echo json_encode($arr);
    }



    //editing exam status
    public function exam_status($id)
    {

        $exam = exam_master::where('id', $id)->get()->first();

        if ($exam->status == 1)
            $status = 0;
        else
            $status = 1;

        $exam1 = exam_master::where('id', $id)->get()->first();
        $exam1->status = $status;
        $exam1->update();
    }



    //Deleting exam status
    public function delete_exam($id)
    {
        $exam1 = exam_master::where('id', $id)->get()->first();
        $exam1->delete();
        return view('admin/dashboard/manage_exam');
    }



    //Edit Exam
    public function edit_exam($id)
    {
        $data['category'] = category::where('status', '1')->get()->toArray();
        $data['exam'] = exam_master::where('id', $id)->get()->first();

        return view('admin/dashboard/edit_exam', $data);
    }


    //Editing Exam
    public function edit_exam_sub(Request $request)
    {

        $exam = exam_master::where('id', $request->id)->get()->first();
        $exam->title = $request->title;
        $exam->exam_date = $request->exam_date;
        $exam->category = $request->exam_category;
        $exam->exam_duration = $request->exam_duration;

        $exam->update();

        echo json_encode(array('status' => 'true', 'message' => 'Successfully updated', 'reload' => url('admin/dashboard/manage_exam')));
    }



    //Manage students
    public function manage_students()
    {

        $data['exams'] = exam_master::where('status', '1')->get()->toArray();
        $data['students'] = user_exam::select(['user_exams.*', 'users.name', 'exam_masters.title as ex_name', 'exam_masters.exam_date'])
            ->join('users', 'users.id', '=', 'user_exams.user_id')
            ->join('exam_masters', 'user_exams.exam_id', '=', 'exam_masters.id')->orderBy('user_exams.exam_id', 'desc')
            ->get()->toArray();
        return view('admin/dashboard/manage_students', $data);
    }


    //Add new students
    public function add_new_students(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'exam' => 'required',
            'password' => 'required'

        ]);

        if ($validator->fails()) {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        } else {
            $std = new User();
            $std->name = $request->name;
            $std->email = $request->email;
            $std->mobile_no = $request->mobile_no;
            $std->exam = $request->exam;
            $std->password = Hash::make($request->password);

            $std->status = 1;

            $std->save();

            $arr = array('status' => 'true', 'message' => 'student added successfully', 'reload' => url('admin/dashboard/manage_students'));
        }

        echo json_encode($arr);
    }



    //Editing student status
    public function student_status($id)
    {
        $std = user_exam::where('id', $id)->get()->first();

        if ($std->std_status == 1)
            $status = 0;
        else
            $status = 1;

        $std1 = user_exam::where('id', $id)->get()->first();
        $std1->std_status = $status;
        $std1->update();
    }


    //Deleting students
    public function delete_students($id)
    {

        $std = user_exam::where('id', $id)->get()->first();
        $std->delete();
        return redirect('admin/dashboard/dashboard/manage_students');
    }



    //Editing students
    public function edit_students_final(Request $request)
    {

        $std = User::where('id', $request->id)->get()->first();
        $std->name = $request->name;
        $std->email = $request->email;
        $std->mobile_no = $request->mobile_no;
        $std->exam = $request->exam;
        if ($request->password != '')
            $std->password = $request->password;

        $std->update();
        echo json_encode(array('status' => 'true', 'message' => 'Successfully updated', 'reload' => url('admin/dashboard/manage_students')));
    }




    //Registered student page
    public function registered_students()
    {

        $data['users'] = User::get()->all();


        return view('admin/dashboard/registered_students', $data);
    }


    //Deleting students egistered
    public function delete_registered_students($id)
    {

        $std = User::where('id', $id)->get()->first();
        $std->delete();
        return redirect('admin/dashboard/dashboard/registered_students');
    }




    //addning questions
    public function add_questions($id)
    {

        $data['questions'] = question_master::where('exam_id', $id)->get()->toArray();
        return view('admin/dashboard/add_questions', $data);
    }


    //adding new questions
    public function add_new_question(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'ans' => 'required'
        ]);

        if ($validator->fails()) {
            $arr = array('status' => 'flase', 'message' => $validator->errors()->all());
        } else {

            $q = new question_master();
            $q->exam_id = $request->exam_id;
            $q->questions = $request->question;

            if ($request->ans == 'option_1') {
                $q->ans = $request->option_1;
            } elseif ($request->ans == 'option_2') {
                $q->ans = $request->option_2;
            } elseif ($request->ans == 'option_3') {
                $q->ans = $request->option_3;
            } else {
                $q->ans = $request->option_4;
            }



            $q->status = 1;
            $q->options = json_encode(array('option1' => $request->option_1, 'option2' => $request->option_2, 'option3' => $request->option_3, 'option4' => $request->option_4));

            $q->save();

            $arr = array('status' => 'true', 'message' => 'successfully added', 'reload' => url('admin/dashboard/add_questions/' . $request->exam_id));
        }

        echo json_encode($arr);
    }



    //Edit question status
    public function question_status($id)
    {
        $p = question_master::where('id', $id)->get()->first();

        if ($p->status == 1)
            $status = 0;
        else
            $status = 1;

        $p1 = question_master::where('id', $id)->get()->first();
        $p1->status = $status;
        $p1->update();
    }


    //Delete questions
    public function delete_question($id)
    {

        $q = question_master::where('id', $id)->get()->first();
        $exam_id = $q->exam_id;
        $q->delete();

        return redirect(url('admin/dashboard/dashboard/add_questions/' . $exam_id));
    }



    //update questions
    public function update_question($id)
    {

        $data['q'] = question_master::where('id', $id)->get()->toArray();

        return view('admin/dashboard/update_question', $data);
    }


    //Edit question
    public function edit_question_inner(Request $request)
    {

        $q = question_master::where('id', $request->id)->get()->first();

        $q->questions = $request->question;

        if ($request->ans == 'option_1') {
            $q->ans = $request->option_1;
        } elseif ($request->ans == 'option_2') {
            $q->ans = $request->option_2;
        } elseif ($request->ans == 'option_3') {
            $q->ans = $request->option_3;
        } else {
            $q->ans = $request->option_4;
        }

        $q->options = json_encode(array('option1' => $request->option_1, 'option2' => $request->option_2, 'option3' => $request->option_3, 'option4' => $request->option_4));

        $q->update();

        echo json_encode(array('status' => 'true', 'message' => 'successfully updated', 'reload' => url('admin/dashboard/add_questions/' . $q->exam_id)));
    }


    public function admin_view_result($id)
    {

        $std_exam = user_exam::where('id', $id)->get()->first();

        $data['student_info'] = User::where('id', $std_exam->user_id)->get()->first();

        $data['exam_info'] = exam_master::where('id', $std_exam->exam_id)->get()->first();

        $data['result_info'] = result::where('exam_id', $std_exam->exam_id)->where('user_id', $std_exam->user_id)->get()->first();

        return view('admin/dashboard/admin_view_result', $data);
    }
}
