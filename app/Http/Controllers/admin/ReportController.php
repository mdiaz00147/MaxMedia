<?php namespace App\Http\Controllers\admin;

use App\Ad;
use App\Ad_Web;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\Revenue;
use App\Web;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index(Request $request)
    {

       
        $reports = Report::ReportHome();
        $mains = Report::ReportMain();
 
        $revenues = Revenue::revenue();
        $reve = Report::revenue_ecpm();
        return view('admin.home',compact('reports','mains','revenues','reve'));
    }

    public function reports()
    {
        $reports = Report::ReportHome();
        $tables = Report::ReportTable();     
        $webs = Web::all();
        $ads = Ad::all();

        return view('admin.reports',compact('reports','webs','ads','tables'));
    }

    public function ReportsAjax(Request $request,$id)
    {
        if($id == 'all')
        {
            if($request->ajax())
            {
                $ads = Ad::all();
                $reports = Report::ReportHome();
                return response()->json([
                    "web" => $reports,
                    'ads' => $ads
                ]);
            }
        }else
        {
            if($request->ajax())
            {
                $web = Web::find($id);
                $ad_web = Ad_Web::find($web->id);
                $ads = Ad::All();
                $reports = Report::ReportWeb($web->id);
                return response()->json([
                    "web" => $reports,
                    "ads" => $ads
                ]);
            }
        }
    }

    public function ReportsAjaxAd(Request $request,$id,$idweb)
    {
        if($idweb == 0){
            if($id == 'all')
            {
                if($request->ajax())
                {
                    $ads = Web::all();
                    $reports = Report::ReportHome();
                    return response()->json([
                        "web" => $reports,
                        'ads' => $ads
                    ]);
                }
            }else
            {
                if($request->ajax())
                {
                    $ad = Ad::find($id);
                    $ad_web = Ad_Web::find($ad->id);
                    $ads = Report::AdAjaxReport($ad_web->id);
                    $reports = Report::ReportAd($ad->id);
                    return response()->json([
                        "web" => $reports,
                        "ads" => $ads
                    ]);
                }
            }
        }else
        {
            if($id == 'all')
            {
                if($request->ajax())
                {
                    $ads = Web::all();
                    $reports = Report::ReportHome();
                    return response()->json([
                        "web" => $reports,
                        'ads' => $ads
                    ]);
                }
            }else
            {
                if($request->ajax())
                {
                    $ad = Ad::find($id);
                    $ad_web = Ad_Web::find($ad->id);
                    $web = Web::find($idweb);
                    $ads = Report::WebAjaxReport($ad_web->id);
                    $reports = Report::ReportAdWeb($ad->id,$web->id);
                    return response()->json([
                        "web" => $reports,
                        "ads" => $ads
                    ]);
                }
            }
        }
    }

    public function ReportsAjaxDate(Request $request,$id,$idad,$date)
    {
        if($idad == 0)
        {
            if($id == 'all')
            {
                if($request->ajax())
                {
                    $date = Report::Time($date);
                    $date1 = $date[0];
                    $date2 = $date[1];
                    $reports = Report::TimeReport($date1,$date2);
                    return response()->json([
                        "web" => $reports
                    ]);
                }
            }else
            {
                if($request->ajax())
                {
                    if($idad == 'all')
                    {
                        if($request->ajax())
                        {
                            $date = Report::Time($date);
                            $date1 = $date[0];
                            $date2 = $date[1];
                            $reports = Report::TimeReport($date1,$date2);
                            return response()->json([
                                "web" => $reports,
                            ]);
                        }
                    }else
                    {
                        $ad = Web::find($id);
                        $date = Report::Time($date);
                        $date1 = $date[0];
                        $date2 = $date[1];
                        $reports =Report::ReportTime($date1,$date2,$ad->id);
                        return response()->json([
                            "web" => $reports,
                        ]);
                    }
                }
            }
        }else
        {
            if($idad == 'all' || $id == 'all' )
            {
                if($request->ajax()){
                    $date = Report::Time($date);
                    $date1 = $date[0];
                    $date2 = $date[1];
                    $reports = Report::TimeReport($date1,$date2);
                    return response()->json([
                        "web" => $reports,
                    ]);
                }
            }else
            {
                if($request->ajax())
                {
                    $ad = Ad::find($idad);
                    $web = Web::find($id);
                    $date = Report::Time($date);
                    $date1 = $date[0];
                    $date2 = $date[1];
                    $reports = Report::TimeReportComplete($date1,$date2,$ad->id,$web->id);
                    return response()->json([
                        "web" => $reports,
                    ]);
                }
            }
        }
    }
    public function ReportsDate(Request $request)
    {
        if($request->ajax())
        {
            $date =    date('Y-m-d',strtotime($request->input('date')));
            $todate =   date('Y-m-d',strtotime($request->input('todate')));
            $idad =   $request->input('ad');
            $idweb =  $request->input('web');
            if($idad == 0)
            {
                if($idweb == 'all')
                {
                    if($request->ajax())
                    {
                        $reports = Report::TimeReport($date,$todate);
                        return response()->json([
                            "web" => $reports
                        ]);
                    }
                }else
                {
                    if($request->ajax())
                    {
                        if($idad == 'all')
                        {
                            if($request->ajax())
                            {
                                $reports = Report::TimeReport($date,$todate);
                                return response()->json([
                                    "web" => $reports,
                                ]);
                            }
                        }else
                        {
                            $ad = Web::find($idweb);
                            $reports =Report::ReportTime($date,$todate,$ad->id);
                            return response()->json([
                                "web" => $reports,
                            ]);
                        }
                    }
                }
            }else
            {
                if($idad == 'all' || $idweb == 'all' )
                {
                    if($request->ajax()){

                        $reports = Report::TimeReport($date,$todate);
                        return response()->json([
                            "web" => $reports,
                        ]);
                    }
                }else
                {
                    if($request->ajax())
                    {
                        $ad = Ad::find($idad);
                        $web = Web::find($idweb);
                        $reports = Report::TimeReportComplete($date,$todate,$ad->id,$web->id);
                        return response()->json([
                            "web" => $reports,
                        ]);
                    }
                }
            }
        }
    }

}
