<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ZooQ;
use App\Question;
use App\CourseDetail;
use App\ClassGrade;
use Illuminate\Support\Facades\Auth;
use Validator;

class QuestionController extends Controller
{
    public function index(){
        $zooq = ZooQ::all();
        $title = 'Question';
        $questions = Question::paginate(5);
        return view('admin.question.question', compact(['title','zooq', 'questions', 'classgrades']));
    }
    public function viewCourse(){
        $zooq = ZooQ::all();
        $title = 'Question';
        $questions = Question::paginate(5);
        return view('admin.question.view_question', compact(['title','zooq', 'questions', 'classgrades']));
    }
    // course detail page
    public function detail_course($id){
        $zooq = ZooQ::all();
        $questions = Question::find($id);
        $courseLabel = $courses->course_code.' - '.$courses->course_name;
        $course_id = $courses->course_id;
        $title = $courses->course_code.' - '.$courses->course_name;
        $course_detail = CourseDetail::all();
        $last_session ($course_detail->last()->session)+1;
        return view('admin.question.question_detail', compact(['title','schools', 'questions', 'course_id', 'courseLabel', 'course_detail']));
    }
    // edit course
    public function edit($id){
        $zooq = ZooQ::all();
        $title = 'Edit Question';
        $cg = ClassGrade::all();
        $classgrades = ClassGrade::all()->where('school_category_id', $schools[0]->school_category_id);
        $questions = Question::find($id);
        return view('admin.course.edit_course', compact(['title','zooq', 'questions', 'classgrades']));
    }

    // add question
    public function store(Request $request){
        $input = $request->all();
        $messages = [
        ];

        $questionImage  = $request->file('file_upload');
        $validator = Validator::make($input, [
            'question' => 'required|max:150|regex:/(^[A-Za-z0-9 ]+$)+/',
            'description' => 'required|max:255'
        ], $messages);

        if ($validator->passes()) {
            $question = new Question;
            if ($request->hasFile('file_upload')) {
                $image_name = time().'.'.$questionImage->getClientOriginalExtension();
                $destinationPath = public_path('/assets/images/question');
                $prefix_name = 'question_';
                $questionImage->move($destinationPath, $prefix_name.$image_name);
                $question->image       = $prefix_name.$image_name;
            }
            $question->question = $input['question'];
            $question->description = $input['description'];
            $question->answer_1 = $input['answer_1'];
            $question->answer_2 = $input['answer_2'];
            $question->answer_3 = $input['answer_3'];
            $question->answer_4 = $input['answer_4'];
            $question->correct_answer = $input['correct_answer'];
            $question->save();
            return redirect('question')->with('success','Question data has been saved');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // update course
    public function update(Request $request, $id){
        $input = $request->all();
        $messages = [
        ];

        $validator = Validator::make($input, [
            'course_code' => 'required|max:10|regex:/(^[A-Za-z0-9]+$)+/',
            'course_name' => 'required|max:150|regex:/(^[A-Za-z0-9 ]+$)+/',
            'class_grade' => 'required|numeric',
            'description' => 'required|max:255'
        ], $messages);

        if ($validator->passes()) {
            $course = Question::find($id);
            $course->class_grade_id = $input['class_grade'];
            $course->course_code = $input['course_code'];
            $course->course_name = $input['course_name'];
            $course->description = $input['description'];
            $course->save();
            return redirect('course')->with('success','Question has been updated');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }
    // Delete Question
    protected function delete(Request $request){
        $id = $request->id;
        $question = Question::find($id);
        $question->delete();
        return redirect('question')->with('success','Question has been deleted.');
    }

    // COURSE DETAIL
    public function store_detail(Request $request, $id){
        $input = $request->all();
        $messages = [
        ];

        $validator = Validator::make($input, [
            'course_outline' => 'required|max:150|regex:/(^[A-Za-z0-9 ]+$)+/',
            'description'    => 'required|max:255',
            'session'        => 'required|numeric',
        ], $messages);

        if ($validator->passes()) {
            $courseDetail = new CourseDetail;
            $courseDetail->course_id = $id;
            $courseDetail->course_outline = $input['course_outline'];
            $courseDetail->description = $input['description'];
            $courseDetail->session = $input['session'];
            $courseDetail->save();
            return redirect('course/detail/'.$id)->with('success','Data has been saved');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }
    // delete detail course
    protected function delete_detail(Request $request){
        $id = $request->id;
        $courseDetail = CourseDetail::find($id);
        $courseDetail->delete();
        return redirect()->back();
    }
}
