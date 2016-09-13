<?php namespace App\Http\Controllers\Referrer;

use App\Ad_Web;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	public function index()
	{
		$reports = Report::ReportHomeReferrer();
		$mains = Report::ReportMainReferrer();
		return view('referrer.home',compact('reports','mains'));
	}

	public function  placement(){
		$placements = Ad_Web::join('webs','webs.id','=','ad__webs.web_id')
							->join('users','users.id','=','webs.user_id')
							->where('users.referrer_id','=',Auth::user()->code_referrer)
							->select('users.*','ad__webs.nombre as n_ad','ad__webs.script as s_ad','ad__webs.id as id_ad','webs.url as url_web')
							->get();
		return view('referrer.placement',compact('placements'));
	}

	public function  referrers(){
		$referrers = User::where('referrer_id','=',Auth::user()->code_referrer)->get();
		return view('referrer.referrer',compact('referrers'));
	}


}
