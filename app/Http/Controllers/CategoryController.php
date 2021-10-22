<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('admin.category.index', [
            'data' => $data, 
            'title' => 'Todas Categorias'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.add', [
            'title' => 'Adicionar Nova Categoria'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            'title' => 'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }else{
            $reImage='na';
        }

        $category=new Category;
        $category->title=$request->title;
        $category->description=$request->description;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/create')->with('success','Category added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Category::find($id);
        return view('admin.category.update', [
            'data' => $data,
            'title' => 'Editar Categoria'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'title' => 'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }else{
            $reImage=$request->cat_img;
        }

        $category=Category::find($id);
        $category->title=$request->title;
        $category->description=$request->description;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/{$id}/edit')->with('success','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::where('id', $id)->delete();
        return redirect('admin/category');
    }
}
