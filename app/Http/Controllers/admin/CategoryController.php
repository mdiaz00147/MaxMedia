<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Controllers\Controller;

use App\Http\Requests\AdminCategoryEditRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categorias = Category::all();
		return view('admin.category.index',compact('categorias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminCategoryCreateRequest $request)
	{
        $category = Category::create($request->all());
        if($category->save()){
            notify()->flash('Created correctly category','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem creating the category','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to("admin/category");
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,AdminCategoryEditRequest $request)
	{
        $category = Category::find($id);
        $category->fill($request->all());
        $category = $category->save();
        if($category){
            notify()->flash('Edit correctly category','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem editing the category','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/category');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $category = Category::find($id);
        $delete = $category->delete();
        if($delete){
            notify()->flash('Delete correctly category','success',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }else{
            notify()->flash('There was a problem deleting the category','error',[
                'timer' => 3000,
                'text'  => ''
            ]);
        }
        return redirect()->to('admin/category');
	}

}
