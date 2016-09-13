<?php namespace App\Http\Controllers;

use App\Ad_Web;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */


    public function count($id){
        $iterator = count(glob(base_path('myFiles/'.$id.'/*.txt'),GLOB_BRACE));
        return $iterator;
    }
    public function countTotal(){
        $ads = Ad_Web::all();
        $iterator = 0;
        foreach($ads as $ad){
            $iterator += count(glob(base_path('myFiles/'.$ad->id.'/*.txt'),GLOB_BRACE));
        }

        return $iterator;
    }
    public function sumPublisher(){
        $publishers = \DB::table('ad__webs')
            ->join('webs','webs.id','=','ad__webs.web_id')
            ->join('users','users.id','=','webs.user_id')
            ->select('ad__webs.id as id_ad','users.nombre as name','webs.*')
            ->get();
        \Session::put('count', array());
        foreach($publishers as $ad)
        {
            $iterator = count(glob(base_path('myFiles/'.$ad->id_ad.'/*.txt'),GLOB_BRACE));
            $count = \Session::get('count');
            $ad->impressions = $iterator;
            $count[$ad->id_ad] = $ad;
            \Session::put('count', $count);
        }
        $publisher = \Session::get('count');
       foreach($publisher as $clave => $value)
        {
            $aux[$clave] = $value->impressions;
        }
        array_multisort($aux, SORT_DESC, $publisher);
        return view('maxmedia.count',compact('publisher'));
    }

}
