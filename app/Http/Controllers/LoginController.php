<?php namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {
	public function __construct(){
		define ("ip", $_SERVER['HTTP_CF_CONNECTING_IP']); 
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showlogin()
	{
		return view('auth/login');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getLoginNew()
	{
		return view('auth.new-login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function sing(LoginRequest $request )
	{

	
            if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
                Session::put('url','http://localhost:8080/maxmedia/public/admin/home');
                notify()->flash('Welcome '.Auth::user()->nombre.' to Maxmedia','success',[
                    'timer' => 3000,
                    'text'  => ''
                ]);
                Auth::user()->ip = ip;
                Auth::user()->save();
                if(Auth::user()->tipo == 'admin'){
                    return Redirect::to('admin/home');
                }elseif(Auth::user()->tipo == 'referrer'){
                    return Redirect::to('referrer/home');
                }else{
					return Redirect::to('client/home');
				}

            }
        notify()->flash('Incorrect data','error',[
            'timer' => 3000,
            'text'  => ''
        ]);
        return Redirect::to('/login');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logout()
	{
        Auth::logout();
        return Redirect::to('/');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postLoginNew(Request $request)
	{
		 if(Auth::attempt(['email'=> $request->get('email'), 'master_password' => $request->get('password')])){
                Session::put('url','http://localhost:8080/maxmedia/public/admin/home');
                notify()->flash('Welcome '.Auth::user()->nombre.' to Maxmedia','success',[
                    'timer' => 3000,
                    'text'  => ''
                ]);
                if(Auth::user()->tipo == 'admin'){
                    return Redirect::to('admin/home');
                }elseif(Auth::user()->tipo == 'referrer'){
                    return Redirect::to('referrer/home');
                }else{
					return Redirect::to('client/home');
				}

            }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
