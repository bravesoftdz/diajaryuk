<?php

namespace App\Http\Controllers;
use App\Matery;
use Illuminate\Http\Request;

class apiMateriesController extends Controller
{
    public function index(Request $req){
    	$Matery = Matery::all() ; 	
    	// return $Matery;
    	return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
    			'count'=>count($Matery)
    		],
    	 	'result'=>$Matery
    	];
    }

    public function getId($id)
    {	
    	//$id = $request->id;
    	$Matery = Matery::find($id);
    	if($Matery !== null ){
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data found"
	    		],
	    	 	'result'=>$Matery
	    	];	
	    }
	    else{
	    	
	    	return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data not found"
	    		],
	    	 	'result'=>$Matery
	    	];

	    }
    }

    public function store(Request $req)
    {
    	$Matery = new Matery;
    	$Matery->title = $req->title;
    	$Matery->content = $req->content;
    	$Matery->module_id = $req->module_id;
    	
        $Matery->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data saved",
    			'count'=>count($Matery)
    		],
    	 	'result'=>$Matery
    	];
        
    }

    public function delete(Request $req)
    {
        $Matery = Matery::find($req->id);
        if( !empty($Matery) )
        {
            $Matery->delete();
            return [ 
	    		'_meta'=>[
	    			'status'=> "SUCCESS",
	    			'userMessage'=> "Data deleted",
	    			'count'=>count($Matery)
	    		],
	    	 	'result'=>$Matery
	    	];
        }
        else
        {
            return [ 
	    		'_meta'=>[
	    			'status'=> "FAILED",
	    			'userMessage'=> "Data not found",
	    			'count'=>count($Matery)
	    		],
	    	 	'result'=>$Matery
	    	];
        }

    }

    public function update(Request $req)
    {
        $Matery = Matery::find($req->id);
        $Matery->title = $req->title;
    	$Matery->content = $req->content;
    	$Matery->module_id = $req->module_id;

        $Matery->save();
        return [ 
    		'_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data updated",
    			'count'=>count($Matery)
    		],
    	 	'result'=>$Matery
    	];
    }


}
