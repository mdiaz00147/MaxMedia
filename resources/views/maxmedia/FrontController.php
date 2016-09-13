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

    public function create()
    {
        $ads = Ad::orderby('nombre')->lists('nombre','id');
        $webs = Web::orderBy('url')->lists('url','id');
        return view('admin.publisher.create',compact('ads','webs'));
    }

    public function total ($date,$todate){
        $date =    date('Y-m-d',strtotime($date));
        $todate =   date('Y-m-d',strtotime($todate));
        $revenues = DB::table('users')
                        ->join('webs','webs.user_id','=','users.id')
                        ->join('ad__webs','ad__webs.web_id','=','webs.id')
                        ->join('reports','reports.ad_web_id','=','ad__webs.id')
                        ->where('reports.ecpm','<>',0)
                        ->whereBetween('reports.fecha',[$date,$todate])
                        ->groupBy('users.id')
                        ->select('webs.*','users.*','reports.*',\DB::raw('sum(impresiones) AS impresiones_dia'),\DB::raw('sum(revenue) AS r'),\DB::raw('avg(ecpm) AS e'))
                        ->get();
            return view('admin.results',compact('revenues'));
    }

    public function store(AdminPlacementCreateRequest $request)
    {
        $placement = Ad_Web::create($request->all());
        $placement->created_at = Carbon::today()->addDay(1);
        $ad = Ad::find($placement->ad_id);
        if($ad->tipo == 'pequeño')
        {
            $placement->script = "<iframe src='".url('imp/'.$placement->id)."' scrolling='no' frameborder='0' width='300' height='250'></iframe>";
            $archivo = base_path('myAds/'.$placement->id.".txt");
            $fp = fopen($archivo,"w+");
            fwrite($fp, $ad->script, 1000);
            fclose($fp);
            $placement->save();

        }elseif($ad->tipo == 'mediano'){
            $placement->script = "<iframe src='".url('imp/'.$placement->id)."' scrolling='no' frameborder='0' width='728' height='90'></iframe>";
            $archivo = base_path('myAds/'.$placement->id.".txt");
            $fp = fopen($archivo,"w+");
            fwrite($fp, $ad->script, 1000);
            fclose($fp);
            $placement->save();

        }elseif($ad->tipo == 'popup'){
            $placement->script = "<script src='".url('imp/'.$placement->id)."'></script>";
              $script = "var ancho = screen.width; var alto = screen.height; var a =0; var popup = 'width='+ancho+',height='+ alto+',scrollbars=no';  document.body.onclick = function(){ if(a == 0) {window.open('http://www.xl415.com/apu.php?n=&zoneid=11497&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1','publicidad', popup);  var capa = document.getElementsByTagName(".'"'."body".'"'.')[0];  var script = document.createElement('.'"'."script".'"'.');  script.setAttribute('.'"'.'type'.'"'.', '.'"'.'text/javascript'.'"'.'); script.setAttribute('.'"'.'src'.'"'.','.'"'.'http://maxcorpmedia.com/impressions/'.$placement->id.'"'.'); capa.appendChild(script); a++; }};';
            $archivo = base_path('myAds/'.$placement->id.".txt");
            $fp = fopen($archivo,"w+");
            fwrite($fp, $script, 1000);
            fclose($fp);
            $placement->save();
        }elseif($ad->tipo == 'vertical'){
               $placement->script = "<iframe src='".url('imp/'.$placement->id)."' scrolling='no' frameborder='0' width='160' height='600'></iframe>";
            $archivo = base_path('myAds/'.$placement->id.".txt");
            $fp = fopen($archivo,"w+");
            fwrite($fp, $ad->script, 1000);
            fclose($fp);
            $placement->save();
        }else{
            $placement->script = "<iframe src='".url('imp/'.$placement->id)." scrolling='no' frameborder='0''></iframe>";
            $archivo = base_path('myAds/'.$placement->id.".txt");
            $fp = fopen($archivo,"w+");
            fwrite($fp, $ad->script, 1000);
            fclose($fp);
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
        foreach($reports as $report)
        {
            $impresiones += $report->impresiones;
        }  
        $revenue->ecpm_total =  $total_revenue * 1000 /$impresiones;
        $revenue->save();

        foreach($reports as $report)
        {
            $reporte_a_guardar = Report::find($report->id);
            $reporte_a_guardar->revenue = $revenue->ecpm_total * $reporte_a_guardar->impresiones / 1000;
            $reporte_a_guardar->save();
            if($reporte_a_guardar->impresiones == 0){
                             $reporte_a_guardar->ecpm = 0;
                            $reporte_a_guardar->save();
            }else{
                         $reporte_a_guardar->ecpm =  $reporte_a_guardar->revenue * 1000 / $reporte_a_guardar->impresiones;
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
