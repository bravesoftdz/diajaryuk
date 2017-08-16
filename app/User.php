<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Stage;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    //pengen nyoba pake method ini di admin middleware
    public function checkRole($req){
        if( $req == 'admin' )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getStage(){
        $user_id = $this->id;
        $stage = Stage::where('user_id','=', $user_id);
        $this->stage = $stage;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}