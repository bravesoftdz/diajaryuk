<?php

namespace App\Http\Controllers;
use App\Matery;
use Illuminate\Http\Request;
use DB;

class apiMateriesController extends Controller
{
    public function index(Request $req){
        $module_id = $req->module_id;
    	$Matery = DB::table('materies'); 	
    	
        if($module_id){
            $Matery = $Matery->where('module_id','=',$module_id);
        }

        $Matery = $Matery->get();
        foreach ($Matery as $key => $value) {
            # code...
            $value->index = $key;
        }

        return [ 
            '_meta'=>[
                'status'=> "SUCCESS",
                'userMessage'=> "Data not found",
                'count'=>count($Matery)
            ],
            'result'=>$Matery
        ];

        // $Matery = $Matery->paginate(1);

    	/*return [ 
            '_meta'=>[
    			'status'=> "SUCCESS",
    			'userMessage'=> "Data not found",
    			'count'=>count($Matery)
    		],
    	 	'result'=>$Matery
    	];*/
        
        //yang bener.
        
        /*$_meta = $Matery->paginate(1);
        $_meta = $_meta->toArray();
        unset($_meta['data']);

        return [ 
            '_meta'=>$_meta,
            'result'=>$Matery->get()//->paginate(1)->toArray()['data']
        ];*/


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
