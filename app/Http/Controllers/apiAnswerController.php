<?php

namespace App\Http\Controllers;
use App\Answer;
use Illuminate\Http\Request;

class apiAnswerController extends Controller
{
    //

    public function index(Request $req){
    	$Answer = Answer::all() ; 	
    	// return $Answer;
    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
    			'count'=>count($Answer)
    		],
    	 	'result'=>$Answer
    	];
    }

    public function getId($id)
    {	
    	//$id = $request->id;
    	$Answer = Answer::find($id);
    	if($Answer !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$Answer
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$Answer
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$Answer = new Answer;
    	$Answer->question_id = $req->question_id;
    	$Answer->answer = $req->answer;
    	
        $Answer->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($Answer)
    		],
    	 	'result'=>$Answer
    	];
        
    }

    public function delete(Request $req)
    {
        $Answer = Answer::find($req->id);
        if( !empty($Answer) )
        {
            $Answer->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($Answer)
	    		],
	    	 	'result'=>$Answer
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($Answer)
	    		],
	    	 	'result'=>$Answer
	    	];
        }

    }

    public function update(Request $req)
    {
        $Answer = Answer::find($req->id);
        $Answer->question_id = $req->question_id;
    	$Answer->answer = $req->answer;
    	
        $Answer->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($Answer)
    		],
    	 	'result'=>$Answer
    	];
    }
}
