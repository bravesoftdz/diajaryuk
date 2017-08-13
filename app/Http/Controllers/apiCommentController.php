<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;
use App\User;
use DB;

class apiCommentController extends Controller
{
    //

    public function index(Request $req){
    	$Comment = DB::table('comments'); //Comment::all() ; 	
    	
        if( $req->matery_id ){
            $Comment = $Comment->where('matery_id','=', $req->matery_id );    
        }

        if( $req->try_out_id ){
            $Comment = $Comment->where('try_out_id','=', $req->try_out_id );    
        }        

        $Comment = $Comment->get();

        foreach ($Comment as $key => $value) {
            # code...
            $user_id = $value->user_id;
            $user = User::select('id','name','email')->find($user_id);

            $value->user = $user;
        }

    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data found",
    			'count'=>count($Comment)
    		],
    	 	'result'=>$Comment
    	];
    }

    public function getId(Request $id)
    {	
    	//$id = $request->id;
    	$Comment = Comment::find($id);
    	if($Comment !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$Comment
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$Comment
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$Comment = new Comment;
    	$Comment->user_id = $req->user_id;
    	$Comment->matery_id = $req->matery_id;
    	$Comment->try_out_id = $req->try_out_id;
    	$Comment->comment = $req->comment;
    	
        $Comment->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($Comment)
    		],
    	 	'result'=>$Comment
    	];
        
    }

    public function delete(Request $req)
    {
        $Comment = Comment::find($req->id);
        if( !empty($Comment) )
        {
            $Comment->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($Comment)
	    		],
	    	 	'result'=>$Comment
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($Comment)
	    		],
	    	 	'result'=>$Comment
	    	];
        }

    }

    public function update(Request $req)
    {
        $Comment = Comment::find($req->id);
        $Comment->user_id = $req->user_id;
    	$Comment->matery_id = $req->matery_id;
    	$Comment->try_out_id = $req->try_out_id;
    	$Comment->comment = $req->comment;

        $Comment->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($Comment)
    		],
    	 	'result'=>$Comment
    	];
    }
}
