<?php

namespace App\Http\Controllers;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class apiQuestionController extends Controller
{
    //

    public function index(Request $req){
    	$Question = Question::all() ; 	
    	// return $Question;

        foreach ($Question as $key => $value) {
            # code...
            $answer = Answer::select('id','question_id','answer')->where('question_id','=', $value->id)->first();
            $value->answer = $answer;
        }

    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
    			'count'=>count($Question)
    		],
    	 	'result'=>$Question
    	];
    }

    public function getId($id)
    {	
    	//$id = $request->id;
    	$Question = Question::find($id);
    	if($Question !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$Question
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$Question
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$Question = new Question;
    	$Question->question_type = $req->question_type;
    	$Question->point = $req->point;
    	$Question->question = $req->question;
    	$Question->answer_1 = $req->answer_1;
    	$Question->answer_2 = $req->answer_2;
    	$Question->answer_3 = $req->answer_3;
    	$Question->answer_4 = $req->answer_4;
    	
        $Question->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($Question)
    		],
    	 	'result'=>$Question
    	];
        
    }

    public function delete(Request $req)
    {
        $Question = Question::find($req->id);
        if( !empty($Question) )
        {
            $Question->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($Question)
	    		],
	    	 	'result'=>$Question
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($Question)
	    		],
	    	 	'result'=>$Question
	    	];
        }

    }

    public function update(Request $req)
    {
        $Question = Question::find($req->id);
        $Question->question_type = $req->question_type;
    	$Question->point = $req->point;
    	$Question->question = $req->question;
    	$Question->answer_1 = $req->answer_1;
    	$Question->answer_2 = $req->answer_2;
    	$Question->answer_3 = $req->answer_3;
    	$Question->answer_4 = $req->answer_4;

        $Question->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($Question)
    		],
    	 	'result'=>$Question
    	];
    }
}
