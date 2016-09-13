<?php namespace App\Http\Controllers\Client;

use App\Ad_Web;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use Illuminate\Http\Request;

class OtherController extends Controller {
    public function showPlacement()
    {
        $ads = Report::PlacementClient();
        return view('client.placement',compact('ads'));
    }

    public function code(Request $request)
    {
         $ad = Ad_Web::find($request->get('id_ad'));
        return response()->json($ad);
    }

}
