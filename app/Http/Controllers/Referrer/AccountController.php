<?php namespace App\Http\Controllers\Referrer;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Security\Core\User\User;
use App\Http\Requests\ClientEditRequest;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \App\User::find(\Auth::user()->id);
		return view('referrer.account',compact('user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	public function password($id,Requests\PasswordRequest $request)
	{
		$user = \App\User::find($id);
		if(\Hash::check($request->get('current_password'),Auth::user()->password)){
			$user->password= $request->get('password');
			$user->save();
			notify()->flash('Change data correctly','success',[
				'timer' => 3000,
				'text'  => ''
			]);
			return redirect()->to('referrer/home');
		}else{
			notify()->flash('Usuario no pudo ser editado de forma correcta','error',[
				'timer' => 3000,
				'text'  => ''
			]);
			return redirect()->to('referrer/home');
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,ClientEditRequest $request)
	{
		$user = \App\User::find($id);
		$user->fill($request->all());
		$user->save();
		if($user->save()){
			notify()->flash('Change data correctly','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}else{
			notify()->flash('Usuario no pudo ser editado de forma correcta','success',[
				'timer' => 3000,
				'text'  => ''
			]);
		}
		return redirect()->to('referrer/home');
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
