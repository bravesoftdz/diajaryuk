<?php

namespace App\Http\Controllers;
use App\Quiz;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use DB;

class apiQuizController extends Controller
{
    
    public function index(Request $req){
    	
        $module_id = $req->module_id;

        $Quiz = DB::table('quizzes'); //Quiz::all() ; 	
        if($module_id){
            $Quiz = $Quiz->where('module_id', '=', $module_id);
        }
        $Quiz = $Quiz->get();

        foreach ($Quiz as $key => $value) {
            # code...
            $questions = Question::find($value->question_id);
            $value->question = $questions;

            $answer = Answer::select('answer')->where('question_id','=', $questions->id )->first();
            $value->answer = $answer;

            $value->index = $key;
            if(isset( $Quiz[$key+1] )){
                $value->next_id = $Quiz[$key+1]->id;
                $value->next_index = $key+1;
            }else{
                $value->next_id = null;
                $value->next_index = null;
            }

            if(isset($Quiz[$key-1])){
                $value->prev_id = $Quiz[$key-1]->id;
                $value->prev_index = $key-1;
                
            }else{
                $value->prev_id = null;
                $value->prev_id = null;
                
            }

        }

        if(count($Quiz) == 0 ){
            $userMessage = "Data not Found";
        }else{
            $userMessage = "Data Found";
        }

    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> $userMessage,
    			'count'=>count($Quiz)
    		],
    	 	'result'=>$Quiz
    	];
    }

    public function getId($id)
    {	
    	//$id = $request->id;
    	$Quiz = Quiz::find($id);
    	if($Quiz !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found",
                    'count'=>count($Quiz)
	    		],
	    	 	'result'=>$Quiz
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$Quiz
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$Quiz = new Quiz;
    	$Quiz->module_id = $req->module_id;
    	$Quiz->question_id= $req->question_id;
    	
        $Quiz->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($Quiz)
    		],
    	 	'result'=>$Quiz
    	];
        
    }

    public function delete(Request $req)
    {
        $Quiz = Quiz::find($req->id);
        if( !empty($Quiz) )
        {
            $Quiz->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($Quiz)
	    		],
	    	 	'result'=>$Quiz
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($Quiz)
	    		],
	    	 	'result'=>$Quiz
	    	];
        }

    }

    public function update(Request $req)
    {
        $Quiz = Quiz::find($req->id);
        $Quiz->module_id = $req->module_id;
    	$Quiz->question_id= $req->question_id;

        $Quiz->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($Quiz)
    		],
    	 	'result'=>$Quiz
    	];
    }
}
