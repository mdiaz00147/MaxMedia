<?php namespace App\Http\Controllers\Referrer;

use App\Ad;
use App\Ad_Web;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Web;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdCreateReferrerRequest;
use App\Http\Requests\AdEditReferrerRequest;
class PlacementController extends Controller {
	public function index()
	{
		$ads = Ad_Web::PlacementReferrer();
		return view('referrer.ad.index',compact('ads'));
	}

	public function create()
	{
		$ads = Ad::orderby('nombre')->lists('nombre','id');
		$webs = DB::table('webs')
			->join('users','users.id','=','webs.user_id')
			->where('users.referrer_id','=',Auth::user()->code_referrer)
			->orderBy('webs.url','asc')
			->select('webs.url','webs.id','users.nombre as name')
			->get();
		return view('referrer.ad.create',compact('ads','webs'));
	}

	public function store(AdCreateReferrerRequest $request)
	{
		$placement = Ad_Web::create($request->all());
		$placement->created_at = Carbon::today()->addDay(1);
		$ad = Ad::find($placement->ad_id);
		
if($ad->tipo == 'pequeno')
		{
			$placement->script = "<iframe src='".url('imp/'.$placement->id.'-smwl')."' scrolling='no' frameborder='0' width='300' height='250'></iframe>";
			$placement->save();

		}elseif($ad->tipo == 'mediano'){
			$placement->script = "<iframe src='".url('imp/'.$placement->id.'-lgrc')."' scrolling='no' frameborder='0' width='728' height='90'></iframe>";
			$placement->save();

		}elseif($ad->tipo == 'popup'){
			$placement->script = "<script src='".url('imp/'.$placement->id.'-pobd')."'></script>";
			$placement->save();
		}elseif($ad->tipo == 'vertical'){
			$placement->script = "<iframe src='".url('imp/'.$placement->id.'-vlty')."' scrolling='no' frameborder='0' width='160' height='600'></iframe>";

			$placement->save();
		}elseif($ad->tipo == 'direct'){
			$placement->script = url('imp/'.$placement->id.'-dirt');
			$placement->save();
		}
		else{
			$placement->script = "<iframe src='".url('imp/'.$placement->id)." scrolling='no' frameborder='0''></iframe>";
			$placement->save();

		}
		if($placement->save()){
			notify()->flash('Placement created correctly','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}else{
			notify()->flash('There was a problem creating the placement','error',[
				'timer' => 3000,
				'text'  => ''
			]);
		}
		return redirect()->to("referrer/ad");
	}

	public function edit($id)
	{
		$placement = Ad_Web::find($id);
		$ads = Ad::orderby('nombre')->lists('nombre','id');
		$webs = DB::table('webs')
			->join('users','users.id','=','webs.user_id')
			->where('users.referrer_id','=',Auth::user()->code_referrer)
			->orderBy('webs.url','asc')
			->select('webs.url','webs.id','users.nombre as name')
			->get();
		return view('referrer.ad.edit',compact('placement','ads','webs'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,AdEditReferrerRequest $request)
	{
		$placement = Ad_Web::find($id);

		$placement->fill($request->all());
		$placement->save();

		$save = $placement->save();

		if($save){
			notify()->flash('Placement edit correctly','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}else{
			notify()->flash('There was a problem editing the placement','error',[
				'timer' => 3000,
				'text'  => ''
			]);
		}
		return redirect()->to('referrer/ad');
	}


}
