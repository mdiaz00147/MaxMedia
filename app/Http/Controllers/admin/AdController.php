<?php namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Http\Requests\AdminAdCreateRequest;
use App\Http\Requests\AdminAdEditRequest;
use App\Http\Requests\AdminAdEditRequestRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $ads = Ad::all();
        return view('admin.ad.index',compact('ads'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.ad.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminAdCreateRequest $request)
	{
        $ad = Ad::create($request->all());
        $ad->slug = str_slug($ad->nombre);
        $ad->save();
        if($ad->save()){
            notify()->flash('Ad created correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the advert','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to("admin/ad");
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $ad = Ad::find($id);
        return view('admin.ad.edit',compact('ad'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,AdminAdEditRequest $request)
	{
        $ad = Ad::find($id);
        $ad->fill($request->all());
        $ad->slug = str_slug($ad->nombre);
        $save = $ad->save();
        if($save){
            notify()->flash('Ad edit correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem editing the advert','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/ad');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $ad = Ad::find($id);
        $delete = $ad->delete();
        if($delete){
            notify()->flash('Ad delete correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem deleting the advert','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/ad');
	}

}
