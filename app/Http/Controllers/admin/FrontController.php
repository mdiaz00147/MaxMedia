<?php namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Ad_Web;
use App\Report;
use App\Revenue;
use App\User;
use App\Http\Requests\AdminPlacementCreateRequest;
use App\Http\Requests\AdminPlacementEditRequest;
use App\Http\Requests\AdminRevenueRequest;
use App\Http\Controllers\Controller;

use App\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FrontController extends Controller {

    public function index()
    {
        $ads = Ad_Web::Placement();
        return view('admin.ads',compact('ads'));
    }

    public function addRevenue(Request $request){
        $id = $request->input('id');
        $fecha = Carbon::parse($request->input('fecha'))->addMinutes(1);
        $report = Report::where('fecha','=',$fecha)->where('ad_web_id','=',$id)->first();
        return view('admin.ad.newRevenue',compact('report'));
    }

    public function  changeRevenue(Request $request,$id){
       $report  = Report::find($id);
        $report->fill($request->all());
        $report->save();
        notify()->flash('Revenue Changed','success',[
            'timer' => 3000,
            'text'  => ''
        ]);
        return redirect()->to('/admin/placement');
    }
    public function create()
    {
        $ads = Ad::orderby('nombre')->lists('nombre','id');
        $webs = Web::orderBy('url')->lists('url','id');
        return view('admin.publisher.create',compact('ads','webs'));
    }

    public function store(AdminPlacementCreateRequest $request)
    {
        $placement = Ad_Web::create($request->all());
        $placement->created_at = Carbon::today()->addDay(1);
        $ad = Ad::find($placement->ad_id);
        if($ad->tipo == 'pequeno')
        {
                $placement->script = "<iframe src='".'http://news.maxcorpmedia.com/imp/'.$placement->id.'-smwl'."' scrolling='no' frameborder='0' width='300' height='250'></iframe>";
            $placement->save();

        }elseif($ad->tipo == 'mediano'){
             $placement->script = "<iframe src='".'http://news.maxcorpmedia.com/imp/'.$placement->id.'-lgrc'."' scrolling='no' frameborder='0' width='728' height='90'></iframe>";
            $placement->save();

        }elseif($ad->tipo == 'popup'){
              $placement->script = "<script src='".'http://news.maxcorpmedia.com/imp/'.$placement->id.'-pobd'."'></script>";
            $placement->save();
        }elseif($ad->tipo == 'vertical'){
               $placement->script = "<iframe src='".'http://news.maxcorpmedia.com/imp/'.$placement->id.'-vlty'."' scrolling='no' frameborder='0' width='160' height='600'></iframe>";

            $placement->save();
        }elseif($ad->tipo == 'direct'){
            $placement->script = url('imp/'.$placement->id.'-dirt');
            $placement->save();
        }elseif($ad->tipo == '468'){

           $placement->script = "<iframe src='".'http://news.maxcorpmedia.com/imp/'.$placement->id.'-difr'."' scrolling='no' frameborder='0' width='468' height='60'></iframe>";
            $placement->save();
	}
	elseif($ad->tipo == '1050X50'){
           $placement->script = "<iframe src='".'http://news.maxcorpmedia.com/imp/'.$placement->id.'-larg'."' scrolling='no' frameborder='0' width='50' height='1050'></iframe>";
            $placement->save();
        }
        else{
            $placement->script = "<iframe src='".url('imp/'.$placement->id)." scrolling='no' frameborder='0''></iframe>";
            $placement->save();

        }
        if($placement->save()){
            notify()->flash('Placement created correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the placement','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to("admin/placement");
    }

    public function edit($id)
    {
        $placement = Ad_Web::find($id);
        $ads = Ad::orderby('nombre')->lists('nombre','id');
        $webs = Web::orderBy('url')->lists('url','id');
        return view('admin.publisher.edit',compact('placement','ads','webs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,AdminPlacementEditRequest $request)
    {
        $placement = Ad_Web::find($id);

        $placement->fill($request->all());
        $placement->save();

        $save = $placement->save();

        if($save){
            notify()->flash('Placement edit correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem editing the placement','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/placement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $placement = Ad_Web::find($id);
        $delete = $placement->delete();
        if($delete){
            notify()->flash('Placement destroy correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem deleting the placement','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/placement');
    }
    public function newRevenue(AdminRevenueRequest $request)
    {
       $total_revenue = $request->input('revenue_total_diario');
        $revenue = new Revenue();
        $revenue->revenue_total_diario= $total_revenue;
        $revenue->fecha = Carbon::parse($request->input('fecha'))->addMinutes(1);
        $reports =  DB::table('reports')
                    ->where('reports.fecha','=',Carbon::parse($request->input('fecha'))->addMinutes(1))
                    ->get();

        $impresiones = 0;
        $clicks_total = 0;
        foreach($reports as $report)
        {   
            $clicks_total += $report->click;
            $impresiones += $report->impresiones;
        }  
        $revenue->ecpm_total =  $total_revenue * 1000 /$impresiones;
        $revenue->CPC_Total = $total_revenue/$clicks_total;
       
        $revenue->save();

        foreach($reports as $report)
        {
            $reporte_a_guardar = Report::find($report->id);
            $reporte_a_guardar->revenue = $revenue->CPC_Total * $reporte_a_guardar->click;
                    $reporte_a_guardar->save();
            if($reporte_a_guardar->impresiones == 0){
                             $reporte_a_guardar->ecpm = 0;
                             $reporte_a_guardar->cpc=0;
                            $reporte_a_guardar->save();
            }else{
                         $reporte_a_guardar->ecpm =  $reporte_a_guardar->revenue * 1000 / $reporte_a_guardar->impresiones;
                        $reporte_a_guardar->save();
            }
            if($reporte_a_guardar->click == 0 ){
            $reporte_a_guardar->cpc=0;
                            $reporte_a_guardar->save();
            }else{
                    $reporte_a_guardar->cpc     = $reporte_a_guardar->revenue/$reporte_a_guardar->click;
                    $reporte_a_guardar->save();
            }
   
        }
    
        notify()->flash('Revenue created correclty','success',[
            'timer' => 3000,
            'text'  => ''
        ]);
        return redirect()->to('admin/home');
    }

}
