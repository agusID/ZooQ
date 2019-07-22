<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz, App\Question, App\ZooQ;

class QuizController extends Controller
{
    public function showQuiz(){
        $quizes = Quiz::all();
        $zooq = ZooQ::all();
        $questions  = Question::all();
        $title = 'Quiz';
        return view('admin.quiz.quiz', compact(['zooq', 'questions', 'title']));
        
    }
    public function viewQuiz(){
        $quizes = Quiz::all();
        $zooq = ZooQ::all();
        $questions  = Question::all();
        $title = 'Quiz';
        return view('admin.quiz.view_quiz', compact(['zooq', 'questions', 'title']));
        
    }
    public function viewScoreResult($score_result){
        $score = $score_result;
        if($score < 0){
            $score = 0;
        }else if($score > 100){
            $score = 9;
        }
        if($score >= 60){
            $label = 'green-label';
        }else{
            $label = 'red-label';
        }
        $quizes = Quiz::all();
        $zooq = ZooQ::all();
        $questions  = Question::all();
        $title = 'Quiz Result';
        return view('admin.quiz.result', compact(['zooq', 'questions', 'title', 'score', 'label']));
    }
    public function submitAnswer(Request $request){
        $questionCheckboxes = $request->input('questionCheckboxes');
        
        $questions = new Question;
        $total_question = $questions->count();
        
        $point = (100 / $total_question);
        
        $score = 0;
        
        foreach ($questionCheckboxes as $question_id){
            $quiz = Question::find($question_id);
            $value = 'QuizID'.$question_id;

            if($quiz->correct_answer == $request->input($value)){
                $score += $point;
            }
        }
        return redirect('quiz/result/'.$score);
 
    }
}
