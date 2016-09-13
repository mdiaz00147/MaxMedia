<?php namespace App\Http\Controllers\Referrer;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Web;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Security\Core\User\User;
use App\Http\Requests\WebEditReferrerRequest;
use App\Http\Requests\WebCreateReferrerRequest;

class WebController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$webs =  \DB::table('webs')
            ->join('users','users.id','=','webs.user_id')
            ->join('categories','categories.id','=','webs.categoria_id')
            ->where('users.referrer_id','=',\Auth::user()->code_referrer)
            ->select('webs.*','users.nombre as n_user','users.apellido as a_user','categories.nombre as c_nombre')
            ->get();
		return view('referrer.web.index',compact('webs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		$users = \App\User::where('users.referrer_id','=',\Auth::user()->code_referrer)->orderBy('nombre')->lists('nombre','id');
		$categorias = Category::orderBy('nombre')->lists('nombre','id');
		return view('referrer.web.create',compact('users','categorias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store(WebCreateReferrerRequest $request)
	{
		$web = Web::create($request->all());
		if($web){
			notify()->flash('Web created correctly','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}else{
			notify()->flash('There was a problem creating the web','error',[
				'timer' => 3000,
				'text'  => ''
			]);
		}
		return redirect()->to("referrer/web");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{
		$web = \Web::find($id);
		$users = \App\User::orderBy('nombre')->where('users.referrer_id','=',\Auth::user()->code_referrer)->lists('nombre','id');
		$categorias = Category::orderBy('nombre')->lists('nombre','id');
		return view('referrer.web.edit',compact('web','users','categorias'));
	}
	public function dir($id)
	{
		$idd = $id;
		$categorias = Category::orderBy('nombre')->lists('nombre','id');
		return view('referrer.web.dir',compact('categorias','idd'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update($id,WebEditReferrerRequest $request)
	{
		$web = \Web::find($id);
		$web->fill($request->all());
		$save = $web->save();
		if($save){
			notify()->flash('Web edit correctly','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}else{
			notify()->flash('There was a problem creating the web','error',[
				'timer' => 3000,
				'text'  => ''
			]);
		}
		return redirect()->to('referrer/web');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
