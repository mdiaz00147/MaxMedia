<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ad_Web extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ad__webs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'script','created_at','updated_at','ad_id','web_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static  function Placement(){
    return  $ads = DB::table('ad__webs')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->join('ads','ads.id','=','ad__webs.ad_id')
            ->select('ad__webs.nombre as n','users.*','webs.*','webs.nombre as w_nombre','users.email as email','ad__webs.script as s','ads.nombre as n_ad','ads.tipo as tipo','ad__webs.id as id_ad','users.nombre as n_nombre','users.apellido as n_apellido')
            ->get();
    }
     public static  function PlacementReferrer(){
        return  $ads = DB::table('ad__webs')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->join('ads','ads.id','=','ad__webs.ad_id')
            ->where('users.referrer_id','=',\Auth::user()->code_referrer)
            ->select('ad__webs.nombre as n','users.*','webs.*','webs.nombre as w_nombre','users.email as email','ad__webs.script as s','ads.nombre as n_ad','ads.tipo as tipo','ad__webs.id as id_ad','users.nombre as n_nombre','users.apellido as n_apellido')
            ->get();
    }


}
