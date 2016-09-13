<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Payment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['earning', 'paid', 'referal','balance','user_id','created_at','updated_at','daily_payment'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static function payment_table(){
        return  $datos = DB::table('users')   
            ->join('payments','payments.user_id','=','users.id') 
            ->where('users.id','=',\Auth::user()->id)
            ->select('users.email as email','payments.*',\DB::raw('sum(paid) AS b'))
            ->whereBetween('payments.created_at',[\Carbon\Carbon::now()->subMonth(8),\Carbon\Carbon::now()->subMinutes(1)])
            ->orderBy('payments.created_at','asc')
            ->groupBy('payments.created_at')
            ->get();
    }

   public static function payment(){
        return  $datos = DB::table('users')   
            ->join('payments','payments.user_id','=','users.id') 
            ->where('users.id','=',\Auth::user()->id)
            ->select('users.email as email','payments.*',\DB::raw('sum(paid) AS b'))
            //->whereBetween('payments.created_at',['2015-11-01 00:01:00','2016-05-31 00:01:00'])
            ->whereBetween('payments.created_at',['2015-11-01 00:01:00',\Carbon\Carbon::now()]) 
	   ->get();
    }

   public static function revenue_dia(){
    return $datos =  DB::table('payments')
        ->join('users','users.id','=','payments.user_id')
        ->where('users.id','=',Auth::user()->id)
        ->select(DB::raw('sum(paid) AS re'))
        ->whereBetween('payments.created_at',[\Carbon\Carbon::today(),\Carbon\Carbon::tomorrow()->subMinutes(1)])
        ->get(); 
    }

   public static function revenue(){
        return $datos = DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
	    ->whereBetween('reports.fecha',['2015-11-01 00:01:00',\Carbon\Carbon::now()])
            //->whereBetween('reports.fecha',['2015-11-01 00:01:00','2016-05-31 00:01:00'])
            ->select(DB::raw('sum(reports.revenue) AS reve'))
            ->get();
    }

    public static function solicitar(){
        return $datos = DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->select('users.id as id_user','users.*','orders.*',DB::raw('sum(cantidad) AS c'))
            ->where('orders.pagada','=','0')
            ->whereBetween('orders.created_at',['2015-11-01 00:01:00',\Carbon\Carbon::now()])
	    // ->whereBetween('orders.created_at',['2015-11-01 00:01:00','2016-05-31 00:01:00'])
            ->orderBy('orders.created_at','asc')
            ->get();
    }
   
    public static function revenue_total(){
        return $datos = DB::table('payments')
            ->join('users','users.id','=','payments.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->select('payments.*',DB::raw('sum(paid) AS r'))
            ->whereBetween('payments.created_at',[\Carbon\Carbon::now()->subMonth(8),\Carbon\Carbon::now()])
            ->get();
    }


}
