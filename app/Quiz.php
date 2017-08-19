<?php

namespace App;
use App\Question;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    /*public function questions(){
    	
    	// return $this->hasOne('App\Question');

    	$questions = Question::find($this->id);
    	$this->questions = $questions;
    	return $this;
    }*/
}
