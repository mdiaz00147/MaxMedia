<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Web extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'webs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'url', 'descripcion','categoria_id','user_id','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static function Webs(){
        return $webs = DB::table('webs')
                            ->join('users','users.id','=','webs.user_id')
                            ->join('categories','categories.id','=','webs.categoria_id')
                            ->orderBy('webs.created_at','asc')
                            ->select('users.*','webs.nombre','webs.*','users.nombre as n_user','users.apellido as a_user','categories.nombre as c_nombre')
                            ->get();
    }
}
