<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\AdminWebCreateRequest;
use App\Http\Requests\AdminWebEditRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Web;
use Illuminate\Http\Request;

class WebController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$webs = Web::Webs();
        return view('admin.web.index',compact('webs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
        $users = User::orderBy('nombre')->lists('nombre','id');
        $categorias = Category::orderBy('nombre')->lists('nombre','id');
		return view('admin.web.create',compact('users','categorias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store(AdminWebCreateRequest $request)
	{
        $web = Web::create($request->all());
        if($web){
            notify()->flash('Web created correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the web','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to("admin/web");
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
        $web = Web::find($id);
        $users = User::orderBy('nombre')->lists('nombre','id');
        $categorias = Category::orderBy('nombre')->lists('nombre','id');
        return view('admin.web.edit',compact('web','users','categorias'));
	}
    public function dir($id)
    {
        $idd = $id;
        $categorias = Category::orderBy('nombre')->lists('nombre','id');
        return view('admin.web.dir',compact('categorias','idd'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update($id,AdminWebEditRequest $request)
	{
        $web = Web::find($id);
        $web->fill($request->all());
        $save = $web->save();
        if($save){
            notify()->flash('Web edit correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the web','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/web');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
        $web = Web::find($id);
        $delete = $web->delete();
        if($delete){
            notify()->flash('Web delte correctly','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the advert','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/web');
    }
}
