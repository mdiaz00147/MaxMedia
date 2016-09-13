<?php namespace App\Http\Controllers\Referrer;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Security\Core\User\User;
use App\Http\Requests\ReferrerCreateRequest;
use App\Http\Requests\ReferrerEditRequestRequest;
class ReferrerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('referrer.refe.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ReferrerCreateRequest $request)
	{
		$user = \App\User::create($request->all());
		$user->tipo= 'user';
		$user->referrer_id = Auth::user()->code_referrer;
		$user->save();
		$nombre = \Input::get('nombre');
		$contraseña = \Input::get('password');

		if($user){
			notify()->flash('User cereate correclty','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}else{
			notify()->flash('There was a problem creating the user','error',[
				'timer' => 3000,
				'text'  => ''
			]);
		}
		return redirect()->to("referrer/web/dir/$user->id");
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
		$user = \App\User::find($id);
		return view('referrer.refe.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,ReferrerEditRequest $request)
	{
		$user = \App\User::find($id);
		$user->fill($request->all());
		$save = $user->save();
		if($save){
			notify()->flash('User edit correctly','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}else{
			notify()->flash('There was a problem creating the user','error',[
				'timer' => 3000,
				'text'  => ''
			]);
		}
		return redirect()->to('referrer/referrers');
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
