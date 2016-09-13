<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Order;
use App\Payment;
use App\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
/*
 $payments = DB::table('users')   
            ->join('payments','payments.user_id','=','users.id') 
            ->where('users.id','=',136)
            ->select('users.email as email','payments.*',\DB::raw('sum(paid) AS b'))
            ->whereBetween('payments.created_at',[\Carbon\Carbon::now()->subMonth(1)->firstOfMonth()->addMinutes(1),\Carbon\Carbon::now()->subMinutes(1)])
            ->get();
 
        $revenue=  $datos = DB::table('reports')
            ->join('ad__webs','ad__webs.id','=','reports.ad_web_id')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->where('users.id','=',136)
            ->whereBetween('reports.fecha',['2016-01-01 00:01:00',\Carbon\Carbon::now()])
            ->select(DB::raw('sum(reports.revenue) AS reve'))
            ->get();
    
        $solicitudes= $datos = DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->where('users.id','=',136)
            ->select('users.id as id_user','users.*','orders.*',DB::raw('sum(cantidad) AS c'))
            ->where('orders.pagada','=','0')
            ->whereBetween('orders.created_at',[\Carbon\Carbon::now()->subMonth(1)->firstOfMonth()->addMinutes(1),\Carbon\Carbon::now()])
            ->orderBy('orders.created_at','asc')
            ->get();
      foreach($revenue as $r){

                    foreach($solicitudes as $re)  {
                         foreach($payments as $payment) 
                    
                            if(($r->reve - $re->c ) - $payment->b >=5){
                                    dd(($r->reve - $re->c ) - $payment->b);
                            }else{
                                    dd('no tiene dinero');
                            }
            
                   
                    }              
                       
      }*/
        $payments = DB::table('users')
            ->join('payments','payments.user_id','=','users.id')
            ->join('webs','webs.user_id','=','webs.id')
            ->select('webs.url as web','users.email as email','payments.*',DB::raw('sum(balance) AS b'))
            ->whereBetween('payments.created_at',[\Carbon\Carbon::now()->subMonth(8),\Carbon\Carbon::now()->subMinutes(1)])
            ->groupBy('payments.created_at')
            ->orderBy('payments.created_at','asc')
            ->get();

         $revenue_last_month = DB::table('payments')
                ->select('payments.*',DB::raw('sum(paid) AS re'))
                ->whereBetween('created_at',[\Carbon\Carbon::now()->subMonth(1)->startOfMonth(),\Carbon\Carbon::now()->subMonth(1)->endOfMonth()])
                ->get(); 


         $revenue_month =DB::table('payments')
                ->select('payments.*',DB::raw('sum(paid) AS r'))
                ->whereBetween('created_at',[\Carbon\Carbon::now()->startOfMonth(),\Carbon\Carbon::now()->endOfMonth()])
                ->get();

         $revenue_total =DB::table('payments')
                ->select('payments.*',DB::raw('sum(paid) AS r'))
                ->whereBetween('created_at',[\Carbon\Carbon::now()->subMonth(8),\Carbon\Carbon::now()->subMinutes(1)])
                ->get();
            return view('admin.payment',compact('payments','revenue_last_month','revenue_total','revenue_month'));

         
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $solicitudes =  DB::table('orders')
                        ->join('users','users.id','=','orders.user_id')
                        ->select('users.id as id_user','users.*','orders.*')
                        ->whereBetween('orders.created_at',[\Carbon\Carbon::now()->subMonth(1),\Carbon\Carbon::now()->subMinutes(1)])
                        ->orderBy('orders.created_at','desc')
                        ->get();
	    return view('admin.solicitud',compact('solicitudes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$order = Order::find($request->get('id'));
        $order->pagada = 1;
        $order->save();
        notify()->flash('Successfully Paid','success',[
            'timer' => 3000,
            'text'  => ''
        ]);
        $pay = new Payment();
        $pay->paid = $order->cantidad;
        $pay->user_id = $request->get('id_user');
        $pay->referal = 0;
        $pay->created_at = Carbon::today();
        $pay->save();
        return redirect()->to('admin/payment/create');
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
	public function update($id,$quantity)
	{
        $order =Order::find($id);
        $order->cantidad = $quantity;
        $order->save();
        return redirect()->to('admin/payment/create');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $web = Order::find($id);
        $delete = $web->delete();
        if($delete){
            notify()->flash('Payment Deleted','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the request','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/payment/create');
	}

}
