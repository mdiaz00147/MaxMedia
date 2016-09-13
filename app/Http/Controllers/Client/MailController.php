<?php namespace App\Http\Controllers\Client;

use App\Http\Requests\AdRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller {

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdRequest $request)
	{
        Mail::send('emails.contact',$request->all(),function($msj){
            $msj->subject('Mail para nuevo placement');
            $msj->to('johan.maxcorp@gmail.com');
        });
            Mail::send('emails.contact',$request->all(),function($msj){
            $msj->subject('Mail para nuevo placement');
            $msj->to('mdiaz00147p@gmail.com');
        });
        notify()->flash('Mail sent correctly','success',[
            'timer' => 3000,
            'text'  => ''
        ]);
        return Redirect::to('client/home');
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
		//
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
