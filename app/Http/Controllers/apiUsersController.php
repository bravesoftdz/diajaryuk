<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Stage;
use DB;

class apiUsersController extends Controller
{
    //
    public function index(Request $req){
    	$User = User::all() ; 	
        // x$User->getStage();

    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data found",
    			'count'=>count($User)
    		],
    	 	'result'=>$User
    	];
    }

    public function getId(Request $id)
    {	
    	//$id = $request->id;
    	$User = User::find($id);
    	if($User !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$User
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$User
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$User = new User;
    	$User->user_id = $req->user_id;
    	$User->matery_id = $req->matery_id;
    	$User->try_out_id = $req->try_out_id;
    	$User->User = $req->User;
    	
        $User->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($User)
    		],
    	 	'result'=>$User
    	];
        
    }

    public function delete(Request $req)
    {
        $User = User::find($req->id);
        if( !empty($User) )
        {
            $User->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($User)
	    		],
	    	 	'result'=>$User
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($User)
	    		],
	    	 	'result'=>$User
	    	];
        }

    }

    public function update(Request $req)
    {
        $User = User::find($req->id);
        $User->user_id = $req->user_id;
    	$User->matery_id = $req->matery_id;
    	$User->try_out_id = $req->try_out_id;
    	$User->User = $req->User;

        $User->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($User)
    		],
    	 	'result'=>$User
    	];
    }
}
