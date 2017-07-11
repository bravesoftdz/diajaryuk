<?php

namespace App\Http\Controllers;
use App\Module;
use Illuminate\Http\Request;

class apiModulesController extends Controller
{
    //
    public function index(Request $req){
    	$Module = Module::all() ; 	
    	// return $Module;
    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
    			'count'=>count($Module)
    		],
    	 	'result'=>$Module
    	];
    }

    public function getId($id)
    {	
    	//$id = $request->id;
    	$Module = Module::find($id);
    	if($Module !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$Module
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$Module
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$Module = new Module;
    	$Module->name = $req->name;
    	$Module->image_path = $req->image_path;
    
        $Module->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($Module)
    		],
    	 	'result'=>$Module
    	];
        
    }

    public function delete(Request $req)
    {
        $Module = Module::find($req->id);
        if( !empty($Module) )
        {
            $Module->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($Module)
	    		],
	    	 	'result'=>$Module
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($Module)
	    		],
	    	 	'result'=>$Module
	    	];
        }

    }

    public function update(Request $req)
    {
        $Module = Module::find($req->id);
        $Module->name = $req->name;
    	$Module->image_path = $req->image_path;

        $Module->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($Module)
    		],
    	 	'result'=>$Module
    	];
    }
}
