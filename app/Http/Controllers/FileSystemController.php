<?php namespace App\Http\Controllers;

use App\Ad;
use App\Ad_Web;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\Web;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileSystemController extends Controller {

    public function files(Filesystem $filesystem,$id,Request $request)
    {
                            $idd = $id;
                            $popup = 'no';
                            $size = 'popup';
                          
                                $url = "";
                                return view('maxmedia.impresiones',compact('id','url','popup','size'));
       
/*
        $ad =  Ad_Web::find($id);
        //  $fecha = date('Y-m-d',strtotime(Carbon::today()));
        $archivo = base_path('myFiles/'.$ad->id.".txt");
        $info = array();

        //comprobar si existe el archivo
        if (file_exists($archivo)){
            // abrir archivo de texto y introducir los datos en el array $info
            $fp = fopen($archivo,"r");
            $contador = fgets($fp, 26);

            $info = explode(" ",$contador);
            if($ad->created_at < Carbon::now() ){
                //$fecha = date('Y-m-d',strtotime(Carbon::today()));
                $reporte = new Report();
                $reporte->ad_web_id = $id;
                $reporte->impresiones = $info[4];
                $reporte->fecha = Carbon::today()->subDay(1)->addMinutes(1);
                $reporte->save();
                $ad->created_at = Carbon::tomorrow();
                $ad->save();
            }
            fclose($fp);

            // poner nombre a cada dato
            $mes_actual = date("m");
            $dia_actual=date("d");

            $mes_ultimo = $info[0];
            $visitas_mes = $info[1];
            $visitas_totales = $info[2];
            $dia_ultimo = $info[3];
            $visitas_dia = $info[4];
        }else{
            // inicializar valores
            $mes_actual = date("m");
            $dia_actual=date("d");
            $dia_ultimo="0";
            $mes_ultimo = "0";
            $visitas_mes = 0;
            $visitas_totales = 0;
            $visitas_dia = 0;
        }

        // incrementar las visitas del mes según si estamos en el mismo
        // mes o no que el de la ultima visita, o ponerlas a cero

        if ($mes_actual==$mes_ultimo){
            $visitas_mes++;
        }else{
            $visitas_mes=1;
        }

        if ($dia_actual==$dia_ultimo){
            $visitas_dia++;
        }
        else{
            $visitas_dia=1;
        }

        $visitas_totales++;

        // reconstruir el array con los nuevos valores
        $info[0] = $mes_actual;
        $info[1] = $visitas_mes;
        $info[2] = $visitas_totales;
        $info[3] = $dia_actual;
        $info[4] = $visitas_dia;


        // grabar los valores en el archivo de nuevo
        $info_nueva = implode(" ",$info);
        $fp = fopen($archivo,"w+");
        fwrite($fp, $info_nueva, 26);
        fclose($fp);
*/
    }
    function borrar () {
        $ads = Ad_Web::all();
        foreach($ads as $ad ){
            $iterator = count(glob(base_path('myFiles/'.$ad->id.'/*.txt'),GLOB_BRACE));
            $ad =  Ad_Web::find($ad->id);
            //$fecha = date('Y-m-d',strtotime(Carbon::today()));
            $reporte = new Report();
            $reporte->ad_web_id = $ad->id;
            $reporte->impresiones = $iterator;
            $reporte->fecha = Carbon::today()->subDay(1)->addMinutes(1);
            $reporte->save();
            $ad->created_at = Carbon::tomorrow();
            $ad->save();
            $files = glob(base_path('myFiles/'.$ad->id.'/*.txt')); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
            }
        }
}
    public function show($id)
    {
  	$array_block = array(265,266);

	foreach($array_block as $b){
		if($id == $b ){
			return ('mamelo');
		}
	}
        $array_largo = array(2,4,6,8,10,14,27,28,32,43,48,52,65,67,71,75,78,80,83,86,89,92,95,99,102,105,108,111);
        $array_pequeño = array(1,3,5,7,9,13,26,29,31,44,47,51,64,68,70,74,77,82,85,88,91,94,98,101,104,107,110);
        $array_popup = array(30,39,42,45,49,53,62,63,66,69,72,76,79,84,87,90,93,96,97,100,103,106,109,112);
        $separared = explode('-',$id);
        foreach($array_largo as $r)
        {
            if( $separared[0] == $r)
            {
                $separared[1] = 'lgrc';
            }
        }
        foreach($array_pequeño as $r)
        {
            if( $separared[0] == $r)
            {
                $separared[1] = 'smwl';
            }
        }
        foreach($array_popup as $r)
        {
            if( $separared[0] == $r)
            {
                $separared[1] = 'pobd';
            }
        }
        if(!isset($separared[1])){
            return "Este anuncio no existe";
        }   
        if($separared[1]=='pobd'){
            $popup = 'si';
            $idd = $separared[0];
            $id = $idd;
            $url = "";
            return view('maxmedia.impresiones',compact('id','url','popup'));
        }elseif($separared[1]=='lgrc'){
            $popup = 'no';
            $idd = $separared[0];
            $id = $idd;
            $size = '728x90';
            $url = "";
            return view('maxmedia.impresiones',compact('id','url','popup','size'));
        }elseif($separared[1]=='smwl'){
            $popup = 'no';
            $idd = $separared[0];
            $id = $idd;
            $size = '320x250';
            $url = "";
            return view('maxmedia.impresiones',compact('id','url','popup','size'));
        }elseif($separared[1]=='vlty'){
            $popup = 'no';
            $idd = $separared[0];
            $id = $idd;
            $size = '160x700';
            $url = "";
            return view('maxmedia.impresiones',compact('id','url','popup','size'));
        }elseif($separared[1]=='dirt'){
            $popup = 'no';
            $idd = $separared[0];
            $id = $idd;
            $size = 'full';
            $url = "";
            return view('maxmedia.impresiones',compact('id','url','popup','size'));
        }elseif($separared[1]=='difr'){
            $popup = 'no';
            $idd = $separared[0];
            $id = $idd;
            $size = '468x60';
            $url = "";
            return view('maxmedia.impresiones',compact('id','url','popup','size'));
        }elseif($separared[1]=='larg'){
            $popup = 'no';
            $idd = $separared[0];
            $id = $idd;
            $size = '1050x50';
            $url = "";
            return view('maxmedia.impresiones',compact('id','url','popup','size'));
        }else{
               return "Este anuncio no existe";
        }
        /*
        $archivo = file(base_path('myAds/'.$id.".txt"));
        $archivos = (base_path('myAds/'.$id.".txt"));
        $palabra="popup";
        $tamaño = 'mediano';
        $archivo2 = file(base_path('myAds/'.$id.".txt"));
        foreach($archivo as $linea)
        {
            foreach($archivo2 as $lin)
            {
                if (strstr($linea,$palabra))
                {
                    $popup = 'si';
                    $idd = $id;

                    if (file_exists($archivos)){
                        $fp = fopen($archivos,"r");
                        $url = fgets($fp, 2000);
                        fclose($fp);
                        $id = $idd;
                        return view('maxmedia.impresiones',compact('id','url','popup'));
                    }
                }
                else
                {
                    if (!isset($_COOKIE['maxcorp_1']) || !isset($_COOKIE['maxcorp_2'])  )
                    {
                        if (strstr($lin,$tamaño))
                        {
                            $idd = $id;
                            $popup = 'no';
                            $size = '728x90';
                            if (file_exists($archivos))
                            {
                                $fp = fopen($archivos,"r");
                                $url = fgets($fp, 1000);
                                fclose($fp);
                                $id = $idd;
                                $expire= time()+60*60*24;
                                setcookie('maxcorp_2',$url,$expire);
                                return view('maxmedia.impresiones',compact('id','url','popup','size'));
                            }
                        }elseif( strstr($lin,'vertical')) 
                        {
                            $idd = $id;
                            $popup = 'no';
                            $size = '160x600';
                            if (file_exists($archivos))
                            {
                                $fp = fopen($archivos,"r");
                                $url = fgets($fp, 1000);
                                fclose($fp);
                                $id = $idd;
                                $expire= time()+60*60*24;
                                setcookie('maxcorp_1',$url,$expire);
                                return view('maxmedia.impresiones',compact('id','url','popup','size'));
                            }
                        }else 
                        {
                            $idd = $id;
                            $popup = 'no';
                            $size = '300x250';
                            if (file_exists($archivos))
                            {
                                $fp = fopen($archivos,"r");
                                $url = fgets($fp, 1000);
                                fclose($fp);
                                $id = $idd;
                                $expire= time()+60*60*24;
                                setcookie('maxcorp_1',$url,$expire);
                                return view('maxmedia.impresiones',compact('id','url','popup','size'));
                            }
                        }

                    }else
                    {
                        $valor_cokkie = $_COOKIE['maxcorp_2'];
                        if(strstr($lin,$tamaño))
                        {
                            $idd = $id;
                            $popup = 'no';
                            $size = '728x90';
                            $id = $idd;
                            $url = $valor_cokkie;
                            return view('maxmedia.impresiones',compact('id','url','popup','size'));
                        }
                        elseif( strstr($lin,'vertical')) 
                        {
                            $idd = $id;
                            $popup = 'no';
                            $size = '160x600';
                            if (file_exists($archivos))
                            {
                                $fp = fopen($archivos,"r");
                                $url = fgets($fp, 1000);
                                fclose($fp);
                                $id = $idd;
                                $expire= time()+60*60*24;
                                setcookie('maxcorp_1',$url,$expire);
                                return view('maxmedia.impresiones',compact('id','url','popup','size'));
                            }
                        }else 
                        {
                            $idd = $id;
                            $popup = 'no';
                            $size = '300x250';
                            if (file_exists($archivos))
                            {
                                $fp = fopen($archivos,"r");
                                $url = fgets($fp, 1000);
                                fclose($fp);
                                $id = $idd;
                                $expire= time()+60*60*24;
                                setcookie('maxcorp_1',$url,$expire);
                                return view('maxmedia.impresiones',compact('id','url','popup','size'));
                            }
                        }
                    }
                }
            }
        }
        */
    }
}
