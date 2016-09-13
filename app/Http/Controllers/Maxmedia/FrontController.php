<?php namespace App\Http\Controllers\Maxmedia;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\User;

class FrontController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function getCodeReferrer($code){
        $user = User::where('code_referrer','=',$code)->first();
        if($user){
            $username = $user->nombre . ' ' . $user->apellido;
            $email = $user->email;
            return view('maxmedia.contact' , compact('username' , 'code' , 
                'email'));
        }
        return redirect()->to('contact');
    }

	public function showIndex()
	{
        if (Auth::check())
        {if(Auth::user()->tipo == 'admin'){
            notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('admin/home');
        }else{

             notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('client/home');
        }
        }else{
		Return view('maxmedia.index');
        }
	}

    public function showAbout()
    {
        if (Auth::check())
        {if(Auth::user()->tipo == 'admin'){
           notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('admin/home');
        }else{

            notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('client/home');
        }
        }else{
            Return view('maxmedia.about');
        }
    }
    public function showPublisher()
    {
        if (Auth::check())
        {if(Auth::user()->tipo == 'admin'){
            notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('admin/home');
        }else{

           notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('client/home');
        }
        }else{
            Return view('maxmedia.publisher');
        }
    }
    public function showContact()
    {
        if (Auth::check())
        {if(Auth::user()->tipo == 'admin'){
             notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('admin/home');
        }else{

            notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('client/home');
        }
        }else{
            Return view('maxmedia.contact');
        }
    }
    public function showAdvertiser()
    {
        if (Auth::check())
        { if(Auth::user()->tipo == 'admin'){
            notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
            return Redirect::to('admin/home');
        }else{

                notify()->flash('Welcome again '.Auth::user()->nombre.' to Maxmedia','success',[
                    'timer' => 3000,
                    'text'  => ''
                ]);
                return Redirect::to('client/home');
        }

        }else{
            Return view('maxmedia.advertisers');
        }
    }

}
