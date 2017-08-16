<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\Matery;
use App\Module;
use App\Try_out;
use App\Quiz;

use DB;
class apiStageController extends Controller
{
    //
    public function index(Request $req){
    	$Stage = DB::table('stages');//Stage::all() ; 	
    	$matery_id = $req->matery_id;
    	$module_id = $req->module_id;
    	$try_out_id = $req->try_out_id;
    	$quiz_id = $req->quiz_id;
    	$user_id = $req->user_id;
    	

    	if($matery_id){
    		$Stage = $Stage->where('matery_id','=', $matery_id );
    	}

    	if($module_id){
    		$Stage = $Stage->where('module_id','=', $module_id );
    	}

    	if($try_out_id){
    		$Stage = $Stage->where('try_out_id','=', $try_out_id );
    	}

    	if($quiz_id){
    		$Stage = $Stage->where('quiz_id','=', $quiz_id );
    	}

    	if($user_id){
    		$Stage = $Stage->where('user_id','=', $user_id );
    	}

    	$result = $Stage->get();

    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
    			'count'=>count($result)
    		],
    	 	'result'=>$result
    	];
    }

    public function getId($id)
    {	
    	//$id = $request->id;
    	$Stage = Stage::find($id);
    	if($Stage !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$Stage
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$Stage
	    	];

	    }
    }


    public function store(Request $req)
    {
    	$Stage = new Stage;
    	$Stage->module_id = $req->module_id;
    	$Stage->matery_id = $req->matery_id;
    	$Stage->try_out_id = $req->try_out_id;
    	$Stage->quiz_id = $req->quiz_id;
    	

        $Stage->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($Stage)
    		],
    	 	'result'=>$Stage
    	];
        
    }

    public function delete(Request $req)
    {
        $Stage = Stage::find($req->id);
        if( !empty($Stage) )
        {
            $Stage->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($Stage)
	    		],
	    	 	'result'=>$Stage
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($Stage)
	    		],
	    	 	'result'=>$Stage
	    	];
        }

    }

    public function update(Request $req)
    {
        $Stage = Stage::find($req->id);
        $Stage->module_id = $req->module_id;
    	$Stage->matery_id = $req->matery_id;
    	$Stage->try_out_id = $req->try_out_id;
    	$Stage->quiz_id = $req->quiz_id;

        $Stage->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($Stage)
    		],
    	 	'result'=>$Stage
    	];
    }
}
