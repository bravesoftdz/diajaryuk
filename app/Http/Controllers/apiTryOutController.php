<?php

namespace App\Http\Controllers;
use App\Try_out;
use Illuminate\Http\Request;

class apiTryOutController extends Controller
{
    
    public function index(Request $req){
    	$try_out = Try_out::all() ; 	
    	// return $try_out;
    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
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
