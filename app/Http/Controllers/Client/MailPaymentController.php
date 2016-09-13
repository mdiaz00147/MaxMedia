<?php namespace App\Http\Controllers\Client;

use App\Http\Requests\MoneyRequest;
use App\Http\Controllers\Controller;

use App\Order;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MailPaymentController extends Controller {

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
	public function store(MoneyRequest $request)
	{
		$payments = Payment::payment();
		$payments_table = Payment::payment_table();
		$revenue_dia = Payment::revenue_dia();
		$revenue = Payment::revenue();
		$solicitudes =  Payment::solicitar();
		$revenue_total = Payment::revenue_total();
		foreach($revenue as $r){
			foreach($solicitudes as $re){
				foreach($payments as $payment){
					//dd((($r->reve - $re->c ) - $payment->b) >= floatval($request->get('cantidad')) - 0.01);
					if((($r->reve - $re->c ) - $payment->b) >= floatval($request->get('cantidad')) - 0.01){
						$order = new Order();
						$order->user_id = \Auth::user()->id;
						$order->cantidad = $request->get('cantidad');
						$order->descripcion = $request->get('email');
						$order->save();
						Mail::send('emails.conctactpayment',$request->all(),function($msj){
							$msj->subject('Mail para solicitud de dinero');
							$msj->to('mdiaz00147@gmail.com');
						});
						notify()->flash('Mail sent correctly','success',[
							'timer' => 3000,
							'text'  => ''
						]);
						return Redirect::to('client/payment');
					}else{
						Session::flash('message','You not have enough money');
						return redirect()->to('client/payment');
					}
				}
			}
		}
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
