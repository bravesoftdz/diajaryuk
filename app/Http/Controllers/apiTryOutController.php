<?php

namespace App\Http\Controllers;
use App\Try_out;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use DB;

class apiTryOutController extends Controller
{
    
    public function index(Request $req){
    	$try_out = DB::table('try_outs'); //Try_out::all() ; 	
    	$matery_id = $req->matery_id;
        
        if($matery_id){
            $try_out = $try_out->where('matery_id','=',$matery_id);
        }

        $try_out = $try_out->get();

        foreach ($try_out as $key => $value) {
            # code...
            $question = Question::find($value->question_id);
            $value->question = $question;

            $answer = Answer::select('answer')->where('question_id','=', $question->id )->first();
            $value->answer = $answer;
        }

        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data found",
    			'count'=>count($try_out)
    		],
    	 	'result'=>$try_out
    	];
    }

    public function getId($id)
    {	
    	//$id = $request->id;
    	$try_out = Try_out::find($id);
    	if($try_out !== null ){

            foreach ($try_out as $key => $value) {
                # code...
                $question = Question::find($value->question_id);
                $value->question = $question;

                $answer = Answer::select('answer')->where('question_id','=', $question->id )->first();
                $value->answer = $answer;
            }

	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$try_out
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$try_out
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$try_out = new Try_out;
    	$try_out->matery_id = $req->matery_id;
    	$try_out->question_id = $req->question_id;
    	
        $try_out->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($try_out)
    		],
    	 	'result'=>$try_out
    	];
        
    }

    public function delete(Request $req)
    {
        $try_out = Try_out::find($req->id);
        if( !empty($try_out) )
        {
            $try_out->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($try_out)
	    		],
	    	 	'result'=>$try_out
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($try_out)
	    		],
	    	 	'result'=>$try_out
	    	];
        }

    }

    public function update(Request $req)
    {
        $try_out = Try_out::find($req->id);
        $try_out->matery_id = $req->matery_id;
    	$try_out->question_id = $req->question_id;
    	

        $try_out->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($try_out)
    		],
    	 	'result'=>$try_out
    	];
    }
}
