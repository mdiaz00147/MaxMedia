<?php namespace App\Http\Controllers\Referrer;


use App\Ad;
use App\Ad_Web;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller {


	public function reports()
	{
		$reports = Report::ReportHomeReferrer();
		$tables = Report::ReportTableReferrer();
		$webs = Report::websReferrer();
		$ads = Report::adsReferrer();
		return view('referrer.report',compact('reports','webs','ads','tables'));
	}
	public function ReportsAjax(Request $request,$id)
	{
		if($id == 'all')
		{
			if($request->ajax())
			{
				$ads = Report::adsReferrer();
				$reports = Report::ReportHomeReferrer();
				return response()->json([
					"web" => $reports,
					'ads' => $ads
				]);
			}
		}else
		{
			if($request->ajax())
			{
				$web =    Web::find($id);
				$ads =  DB::table('ad__webs')
					->where('ad__webs.web_id','=',$web->id)
					->select('ad__webs.*')
					->get();

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
					$ads =  Report::websReferrer();
					$reports = Report::ReportHomeReferrer();
					return response()->json([
						"web" => $reports,
						'ads' => $ads
					]);
				}
			}else
			{
				if($request->ajax())
				{
					$ad = Ad_Web::find($id);
					$ads = Report::WebAjaxReport($id);
					$reports = Report::ReportAdClient($ad->id);
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
					$ads = DB::table('webs')
						->join('users','users.id','=','webs.user_id')
						->where('users.referrer_id','=',Auth::user()->code_referrer)
						->select('webs.*')
						->get();
					$reports = Report::ReportHomeReferrer();
					return response()->json([
						"web" => $reports,
						'ads' => $ads
					]);
				}
			}else
			{
				if($request->ajax())
				{
					$ad_web = Ad_Web::find($id);
					$web = Web::find($idweb);
					$ads = Report::WebAjaxReport($ad_web->id);
					$reports = Report::ReportAdWebClient($ad_web->id,$idweb);
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
					$ads = Report::ReportAdAjaxClient();
					$date = Report::Time($date);
					$date1 = $date[0];
					$date2 = $date[1];
					$reports = Report::TimeReportClient($date1,$date2);
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
							$ads = Report::ReportAdAjaxClient();
							$date = Report::Time($date);
							$date1 = $date[0];
							$date2 = $date[1];
							$reports = Report::TimeReportClient($date1,$date2);
							return response()->json([
								"web" => $reports
							]);
						}
					}else
					{
						$ads = Report::ReportAdAjaxClient();
						$date = Report::Time($date);
						$date1 = $date[0];
						$date2 = $date[1];
						$reports =Report::ReportTimeClient($date1,$date2,$id);
						return response()->json([
							"web" => $reports

						]);
					}
				}
			}
		}else
		{
			if($idad == 'all' || $id == 'all' )
			{

			}else
			{
				if($request->ajax())
				{
					$ad = Ad_Web::find($idad);
					$web = Web::find($id);
					$date = Report::Time($date);
					$date1 = $date[0];
					$date2 = $date[1];
					$reports = Report::TimeReportCompleteClient($date1,$date2,$ad->id,$web->id);
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
						$reports = Report::TimeReportClient($date,$todate);
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
								$reports = Report::TimeReportClient($date,$todate);
								return response()->json([
									"web" => $reports,
								]);
							}
						}else
						{
							$ad = Web::find($idweb);
							$reports =Report::ReportTimeClient($date,$todate,$ad->id);
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

						$reports = Report::TimeReportClient($date,$todate);
						return response()->json([
							"web" => $reports,
						]);
					}
				}else
				{
					if($request->ajax())
					{
						$ad = Ad_Web::find($idad);
						$web = Web::find($idweb);
						$reports = Report::TimeReportCompleteClient($date,$todate,$ad->id,$web->id);
						return response()->json([
							"web" => $reports,
						]);
					}
				}
			}
		}
	}

}
