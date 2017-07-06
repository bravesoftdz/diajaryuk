<?php

namespace App\Http\Controllers;
use App\Quiz;
use Illuminate\Http\Request;

class apiQuizController extends Controller
{
    
    public function index(Request $req){
    	$Quiz = Quiz::all() ; 	
    	// return $Quiz;
    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
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
	    			'userMessage'=> "Data found"
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
