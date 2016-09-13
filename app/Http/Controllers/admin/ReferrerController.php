<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReferrerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$referrers = User::where('tipo','=','referrer')->get();
		return view('admin.referrer.index',compact('referrers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.referrer.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$referrer = User::create($request->all());
		$referrer->tipo ='referrer';
		$referrer->save();
		notify()->flash('Referrer create  correclty','success',[
			'timer' => 3000,
			'text'  => ''
		]);
		$data = array(
			'nombre' => $request->get('nombre'),
			'contraseña' => $request->get('password'),
			'code_referrer' => $request->get('code_referrer')
		);
		Mail::send('emails.cotact-referrer', $data ,function($msj){
			$msj->subject('Welcome to maxmedia dear Referrer');
			$msj->to(\Input::get('email'));
		});
		return redirect()->to('admin/referrer');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$referrer = User::find($id);
		$url = \URL::current();
		$consulta = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
						->join('webs','webs.id','=','ad__webs.web_id')
						->join('users','users.id','=','webs.user_id')
						->where('users.referrer_id','=',$referrer->code_referrer)
						->whereBetween('reports.fecha',[Carbon::today()->subDay(1),Carbon::now()]);

		$consulta_total = Report::join('ad__webs','ad__webs.id','=','reports.ad_web_id')
			->join('webs','webs.id','=','ad__webs.web_id')
			->join('users','users.id','=','webs.user_id')
			->where('users.referrer_id','=',$referrer->code_referrer)
			->whereBetween('reports.fecha',[Carbon::now()->firstOfMonth(),Carbon::now()]);

		$referrers = User::join('webs','webs.user_id','=','users.id')
				->where('referrer_id','=',$referrer->code_referrer)->
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
		$id =$referrer->id;
		return view('admin.referrer.static',
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
				'id',
				'url'
			)
		);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$referrer = User::find($id);
		return view('admin.referrer.edit',compact('referrer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$referrer = User::find($id);
		$alls = User::where('referrer_id','=',$referrer->code_referrer)->get();
		foreach($alls as $all){
			$all->referrer_id = $request->get('code_referrer');
			$all->save();
		}
		$referrer->fill($request->all());
		$referrer->save();
		notify()->flash('Referrer edit correclty','success',[
			'timer' => 3000,
			'text'  => ''
		]);
		return redirect()->to('admin/referrer');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 User::find($id)->delete();
		notify()->flash('Referrer delete correclty','success',[
			'timer' => 3000,
			'text'  => ''
		]);
		return redirect()->to('admin/referrer');
	}

}
