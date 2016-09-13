<?php namespace App\Http\Controllers\Client;

use App\Http\Requests\ClientEditRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = User::find(\Auth::user()->id);
		return view('client.account',compact('user'));
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
	public function password($id,PasswordRequest $request)
	{
		$user = User::find($id);
               if(Hash::check($request->get('current_password'),Auth::user()->password)){
            $user->password= $request->get('password');
            $user->save();
            notify()->flash('Usuario  editado de forma correcta','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return redirect()->to('client/home');
        }else{
            notify()->flash('Usuario no pudo ser editado de forma correcta','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return redirect()->to('client/home');
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
		$user = User::find($id);
        $user->fill($request->all());
        $user->save();
        if($user->save()){
            notify()->flash('Usuario editado de forma correcta','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('Usuario no pudo ser editado de forma correcta','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('client/home');
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
