<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Report extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'impresiones', 'click','ctr','ecpm','revenue','ad_web_id','CPC','created_at','updated_at'];

    /*Client Reports*/
    public static function PlacementClient(){
        return $placement = DB::table('ad__webs')
                            ->join('webs','webs.id','=','ad__webs.web_id')
                            ->join('users','users.id','=','webs.user_id')
                            ->join('ads','ads.id','=','ad__webs.ad_id')
                            ->where('users.id','=', Auth::user()->id)
                            ->select('ad__webs.id as id_ad','ad__webs.descripcion','ad__webs.nombre as nombre_ad_web','webs.url as web','ads.tipo as tipo','ads.nombre as nombre_ad','ad__webs.script as script')
                            ->get();
    }
        public static function ReportMainReferrer(){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.referrer_id','=',Auth::user()->code_referrer)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(1),\Carbon\Carbon::today()->subMinutes(1)])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(cpc) AS cp'))
            ->get();
    }
        public static function ReportTableReferrer(){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.referrer_id','=',Auth::user()->code_referrer)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()])
            ->groupBy('fecha')
            ->orderBy('fecha','desc')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }

    public static function ReportHomeReferrer(){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.referrer_id','=',Auth::user()->code_referrer)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()->subMinutes(1)])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }
     public static function websReferrer(){
        return $webs =  DB::table('webs')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.referrer_id','=',Auth::user()->code_referrer)
            ->select('webs.*')
            ->get();
    }
 public static function adsReferrer(){
        return $webs =  DB::table('ad__webs')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.referrer_id','=',Auth::user()->code_referrer)
            ->select('ad__webs.*')
            ->get();
    }
    public static function ReportHomeClient(){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()->subMinutes(1)])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(click) AS c'),\DB::raw('sum(revenue) AS r'),\DB::raw('avg(ecpm) AS e'))
            ->get();
    }
    public static function totalAll(){
       return  \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()->subMinutes(1)]);
    }
    public static function ReportMainClient(){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(1),\Carbon\Carbon::today()->subMinutes(1)])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(cpc) AS cp'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(click) AS c'))
            ->get();
    }
    public static function ReportTableClient(){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()])
            ->groupBy('fecha')
            ->orderBy('fecha','desc')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('avg(ecpm) AS e'),\DB::raw('sum(click) AS c'))
            ->get();
    }

    public static function webs(){
        return $webs =  DB::table('webs')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->select('webs.*')
            ->get();
    }

    public static function ads(){
        return $webs =  DB::table('ad__webs')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->select('ad__webs.*')
            ->get();
    }
    public static function TimeReportCompleteClient($date1,$date2,$idad,$idweb){
        return   $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->where('webs.id','=',$idweb)
            ->where('ad__webs.id','=',$idad)
            ->whereBetween('fecha',[$date1,$date2])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(click) AS c'))
            ->get();
    }
    public static  function  AdAjaxReportClient($id){
        return $ads = DB::table('ad__webs')
            ->join('ads','ads.id','=','ad__webs.ad_id')
            ->where('ad__webs.id','=',$id)
            ->select('ads.nombre','ads.id')
            ->get();
    }

    public static function ReportAdClient($id){
        return  $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->where('ad__webs.id','=',$id)
            ->whereBetween('fecha',[\Carbon\Carbon::now()->subDay(8),\Carbon\Carbon::now()])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(click) AS c'))
            ->get();

    }
    public static function ReportAdWebClient($idad,$idweb){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->where('webs.id','=',$idweb)
            ->where('ad__webs.id','=',$idad)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(click) AS click'))
            ->get();
    }

    public static function ReportAdAjaxClient(){
       return  DB::table('webs')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->select('webs.*')
            ->get();
    }
    /*Reports admin*/
    public static function ReportHome(){
        return $reports = \DB::table('reports')
            ->where('reports.ecpm','<>','0')
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }
    public static function ReportTable(){
        return $reports = \DB::table('reports')
          ->where('reports.ecpm','<>','0')
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()])
            ->groupBy('fecha')
            ->orderBy('fecha','desc')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('avg(ecpm) AS e'))
            ->get();
    }
    public static function ReportMain(){
        return $reports = \DB::table('reports')
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(1),\Carbon\Carbon::today()->subMinutes(1)])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(click) AS c'))
            ->get();
    }
    public static function revenue_ecpm(){
        return $reports = \DB::table('revenues')
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(1),\Carbon\Carbon::today()->subMinutes(1)])
            ->groupBy('fecha')
            ->select('revenues.*')
            ->get();
    }
    public static  function  AdAjaxReport($id){
        return $ads = DB::table('ad__webs')
            ->join('ads','ads.id','=','ad__webs.ad_id')
            ->where('ad__webs.id','=',$id)
            ->select('ads.nombre','ads.id')
            ->get();
    }

    public static function  ReportWeb($id){
        return  $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->where('webs.id','=',$id)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }


    public static function ReportAd($id){
        return  $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('ads','ads.id','=','ad__webs.ad_id')
            ->where('ads.id','=',$id)
            ->whereBetween('fecha',[\Carbon\Carbon::now()->subDay(8),\Carbon\Carbon::now()])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();

    }

    public static function WebAjaxReport($id){
        return      $ads = DB::table('ad__webs')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->where('ad__webs.id','=',$id)
            ->select('webs.nombre','webs.id')
            ->get();
    }

    public static function ReportAdWeb($idad,$idweb){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('ads','ads.id','=','ad__webs.ad_id')
            ->where('webs.id','=',$idweb)
            ->where('ads.id','=',$idad)
            ->whereBetween('fecha',[\Carbon\Carbon::today()->subDay(8),\Carbon\Carbon::today()])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }

    public static function Time($date){
        $date1=\Carbon\Carbon::today()->subDay(8);
        $date2=\Carbon\Carbon::today();
        if($date == 'yesterday'){
            $date1=\Carbon\Carbon::today()->subDay(1);
            $date2=\Carbon\Carbon::today()->addMinutes(1);
            return array($date1,$date2);
        }
        if($date == 'Last8'){
            $date1=\Carbon\Carbon::today()->subDay(8);
            $date2=\Carbon\Carbon::today()->addMinutes(1);
            return array($date1,$date2);
        }

        if($date == 'current'){
            $date = Carbon::now()->startOfMonth();
            $date1 = date('Y-m-d',strtotime($date));
            $date2=\Carbon\Carbon::today()->addMinutes(1);
            return array($date1,$date2);
        }
        if($date == 'last'){
            $date = Carbon::now()->subMonth(1)->startOfMonth();
            $date1 = date('Y-m-d',strtotime($date));
            $datee = Carbon::now()->subMonth(1)->endOfMonth();
            $date2 = date('Y-m-d',strtotime($datee));
            return array($date1,$date2);
        }
    }

    public static function TimeReport($date1,$date2){
        return   $reports = \DB::table('reports')
            ->whereBetween('fecha',[$date1,$date2])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }
    public static function TimeReportClient($date1,$date2){
        return   $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->groupBy('fecha')
            ->whereBetween('fecha',[$date1,$date2])
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(click) AS c'))
            ->get();
    }
    public static function ReportTime($date1,$date2,$id){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->where('webs.id','=',$id)
            ->whereBetween('fecha',[$date1,$date2])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }

    public static function ReportTimeClient($date1,$date2,$id){
        return $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->where('webs.id','=',$id)
            ->whereBetween('fecha',[$date1,$date2])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'),\DB::raw('sum(click) AS c'))
            ->get();
    }

    public static function TimeReportComplete($date1,$date2,$idad,$idweb){
        return   $reports = \DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('ads','ads.id','=','ad__webs.ad_id')
            ->where('webs.id','=',$idweb)
            ->where('ads.id','=',$idad)
            ->whereBetween('fecha',[$date1,$date2])
            ->groupBy('fecha')
            ->select('reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('sum(ecpm) AS e'))
            ->get();
    }
}
