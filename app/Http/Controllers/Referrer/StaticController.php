<?php namespace App\Http\Controllers\Referrer;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($date,$from = '',$to = '',$r_id='#')
	{
		$url = \URL::current();
		$array = array();
		$array = explode('/',$url);
		if(is_numeric($array[count($array)-1])){
			unset($array[count($array)-1]);
			$url = implode('/',$array);
		}
		if($from == '' || $to == ''){
			$url = \URL::current().'/'.'void'.'/'.'void';
		}
				if($r_id != '#'){
			if($date == 'yesterday'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->where('users.id','=',$r_id)
					->whereBetween('reports.fecha',[Carbon::today()->subDay(1),Carbon::now()])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'Yesterday';
				$reports = $consulta->get();
			}
			elseif($date == 'eight'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->where('users.id','=',$r_id)
					->whereBetween('reports.fecha',[Carbon::today()->subDay(8),Carbon::now()])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'Eight Days';
				$reports = $consulta->get();
			}
			elseif($date == 'current'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->where('users.id','=',$r_id)
					->whereBetween('reports.fecha',[Carbon::now()->firstOfMonth(),Carbon::now()])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'Current Month';
				$reports = $consulta->get();
			}
			elseif($date == 'last'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->where('users.id','=',$r_id)
					->whereBetween('reports.fecha',[ Carbon::now()->subMonth(1)->startOfMonth(), Carbon::now()->subMonth(1)->endOfMonth()]);
				$fecha = 'Last  Month';
				$reports = $consulta->get();
			}elseif($date == 'custom'){
				$from = str_replace("-","/",$from);
				$to = str_replace("-","/",$to);
				$date = Carbon::parse($from);
				$toDate = Carbon::parse($to);
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->where('users.id','=',$r_id)
					->whereBetween('reports.fecha',[ $date, $toDate])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'From : '.$from."<br>".' To : '.$to;
				$reports = $consulta->get();
			}
			$consulta_total = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
				->join('webs','webs.id','=','ad__webs.web_id')
				->join('users','users.id','=','webs.user_id')
				->where('users.referrer_id','=',\Auth::user()->code_referrer)
				->where('users.id','=',$r_id)
				->whereBetween('reports.fecha',[Carbon::now()->firstOfMonth(),Carbon::now()])
				->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');

			$referrers = User::join('webs','webs.user_id','=','users.id')
				->where('referrer_id','=',\Auth::user()->code_referrer)->
				select('webs.url as web','users.*')->get();

			$total_payment = $consulta->sum('revenue');
			$total_ctr = $consulta->avg('CTR');
			$total_clicks = $consulta->sum('click');
			$total_cpc= $consulta->avg('CPC');
			$total_impressions = $consulta->sum('impresiones');
			$total_cpm = $consulta->avg('ecpm');

			$total_payment_month = $consulta_total->sum('revenue');
			$total_ctr_month = $consulta_total->avg('CTR');
			$total_clicks_month = $consulta_total->sum('click');
			$total_cpc_month = $consulta_total->avg('CPC');
			$total_impressions_month = $consulta_total->sum('impresiones');
			$total_cpm_month = $consulta_total->avg('ecpm');
			return view('referrer.static',
				compact(
					'total_payment',
					'total_ctr',
					'total_clicks',
					'total_cpc',
					'total_impressions',
					'total_cpm',
					'total_payment_month',
					'total_ctr_month',
					'total_clicks_month',
					'total_cpc_month',
					'total_impressions_month',
					'total_cpm_month',
					'referrers',
					'reports',
					'fecha',
					'url'
				)
			);
		}else{
			if($date == 'yesterday'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->whereBetween('reports.fecha',[Carbon::today()->subDay(1),Carbon::now()])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'Yesterday';
				$reports = $consulta->get();
			}
			elseif($date == 'eight'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->whereBetween('reports.fecha',[Carbon::today()->subDay(8),Carbon::now()])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'Eight Days';
				$reports = $consulta->get();
			}
			elseif($date == 'current'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->whereBetween('reports.fecha',[Carbon::now()->firstOfMonth(),Carbon::now()])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'Current Month';
				$reports = $consulta->get();
			}
			elseif($date == 'last'){
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->whereBetween('reports.fecha',[ Carbon::now()->subMonth(1)->startOfMonth(), Carbon::now()->subMonth(1)->endOfMonth()]);
				$fecha = 'Last  Month';
				$reports = $consulta->get();
			}elseif($date == 'custom'){
				$from = str_replace("-","/",$from);
				$to = str_replace("-","/",$to);
				$date = Carbon::parse($from);
				$toDate = Carbon::parse($to);
				$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
					->join('webs','webs.id','=','ad__webs.web_id')
					->join('users','users.id','=','webs.user_id')
					->where('users.referrer_id','=',\Auth::user()->code_referrer)
					->whereBetween('reports.fecha',[ $date, $toDate])
					->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');
				$fecha = 'From : '.$from."<br>".' To : '.$to;
				$reports = $consulta->get();
			}
			$consulta_total = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
				->join('webs','webs.id','=','ad__webs.web_id')
				->join('users','users.id','=','webs.user_id')
				->where('users.referrer_id','=',\Auth::user()->code_referrer)
				->whereBetween('reports.fecha',[Carbon::now()->firstOfMonth(),Carbon::now()])
				->select('users.nombre as n_user','users.apellido as a_user','reports.*','ad__webs.nombre as ad_name');

			$referrers = User::join('webs','webs.user_id','=','users.id')
				->where('referrer_id','=',\Auth::user()->code_referrer)
				->select('webs.url as web','users.*')->get();

			$total_payment = $consulta->sum('revenue');
			$total_ctr = $consulta->avg('CTR');
			$total_clicks = $consulta->sum('click');
			$total_cpc= $consulta->avg('CPC');
			$total_impressions = $consulta->sum('impresiones');
			$total_cpm = $consulta->avg('ecpm');

			$total_payment_month = $consulta_total->sum('revenue');
			$total_ctr_month = $consulta_total->avg('CTR');
			$total_clicks_month = $consulta_total->sum('click');
			$total_cpc_month = $consulta_total->avg('CPC');
			$total_impressions_month = $consulta_total->sum('impresiones');
			$total_cpm_month = $consulta_total->avg('ecpm');
			return view('referrer.static',
				compact(
					'total_payment',
					'total_ctr',
					'total_clicks',
					'total_cpc',
					'total_impressions',
					'total_cpm',
					'total_payment_month',
					'total_ctr_month',
					'total_clicks_month',
					'total_cpc_month',
					'total_impressions_month',
					'total_cpm_month',
					'referrers',
					'reports',
					'fecha',
					'url'
				)
			);
		}
	}
	public function show()
	{

		$url = \URL::current();
		$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
			->join('webs','webs.id','=','ad__webs.web_id')
			->join('users','users.id','=','webs.user_id')
			->where('users.referrer_id','=',Auth::user()->code_referrer)
			->whereBetween('reports.fecha',[Carbon::today()->subDay(1),Carbon::now()]);

		$consulta_total = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
			->join('webs','webs.id','=','ad__webs.web_id')
			->join('users','users.id','=','webs.user_id')
			->where('users.referrer_id','=',Auth::user()->code_referrer)
			->whereBetween('reports.fecha',[Carbon::now()->firstOfMonth(),Carbon::now()]);

		$referrers = User::join('webs','webs.user_id','=','users.id')
			->where('referrer_id','=',Auth::user()->code_referrer)->
			select('webs.url as web','users.*')->get();

		$total_payment = $consulta->sum('revenue');
		$total_ctr = $consulta->avg('CTR');
		$total_clicks = $consulta->sum('click');
		$total_cpc= $consulta->avg('CPC');
		$total_impressions = $consulta->sum('impresiones');
		$total_cpm = $consulta->avg('ecpm');

		$total_payment_month = $consulta_total->sum('revenue');
		$total_ctr_month = $consulta_total->avg('CTR');
		$total_clicks_month = $consulta_total->sum('click');
		$total_cpc_month = $consulta_total->avg('CPC');
		$total_impressions_month = $consulta_total->sum('impresiones');
		$total_cpm_month = $consulta_total->avg('ecpm');
		return view('referrer.static',
			compact(
				'total_payment',
				'total_ctr',
				'total_clicks',
				'total_cpc',
				'total_impressions',
				'total_cpm',
				'total_payment_month',
				'total_ctr_month',
				'total_clicks_month',
				'total_cpc_month',
				'total_impressions_month',
				'total_cpm_month',
				'referrers',
				'url'
			)
		);
	}


}
