<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Controllers\Controller;

use App\Http\Requests\AdminUserEditRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();
	 return view('admin.user.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminUserCreateRequest $request)
	{
        $user = User::create($request->all());
        $user->tipo= 'user';
        $user->save();
        $nombre = \Input::get('nombre');
        $contraseña = \Input::get('password');
        $data = array(
            'nombre' => $nombre,
            'contraseña' => $contraseña
        );
        Mail::send('emails.contact-new', $data ,function($msj){
            $msj->subject('Welcome to maxmedia');
            $msj->to(\Input::get('email'));
        });

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
        return redirect()->to("admin/web/dir/$user->id");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function dir($id)
	{
	        return view('admin.web.dir');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
        return view('admin.user.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,AdminUserEditRequest $request)
	{
        $user = User::find($id);
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
        return redirect()->to('admin/user');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = User::find($id);
        $delete = $user->delete();
        if($delete){
            notify()->flash('User delete corerctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the user ','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/web');
	}
}
