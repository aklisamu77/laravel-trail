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
    public function index($currentPage=1)
    {
       //$categories = Category::orderBy('id', 'desc')->paginate(5,['*'], 'page',$currentPage);
       //$categories = Category::all();
       //dd($categories);
        return view('categories.index'/* , ["cats"=>$categories]*/);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //dd($request->all());
        $validation = $request->validate([
                            "name"=>"required|alpha|unique:categories,cat_name",
                            "comments"=>"required|max:1000"
                    ]);
        $cat = new Category();
        $cat->cat_name = $request->name;
        $cat->comments = $request->comments;
        $cat->save();
        return redirect('/category')->with('message', 'Category Created!');
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
    
    public function search($search){
        //echo $q = Input::get ( 'search' );
        //echo $search;
        $rslt = Category::where('cat_name','like','%'.$search.'%')->paginate(1);
        return view('categories.search' , ["cats"=>$rslt,'search'=>$search]);
        //dd($rslt);
        
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findorFail($id);
        return view('categories.edit' , ["category"=>$category]);
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
        //
        $validation = $request->validate([
                            "name"=>"required|alpha|unique:categories,cat_name,$id",
                            "comments"=>"required|max:1000"
                    ]);
        $cat = Category::findorFail($id);
        $cat->cat_name = $request->name;
        $cat->comments = $request->comments;
        $cat->save();
        return redirect('/category')->with('message', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findorFail($id);
        $category->delete();
        return redirect('/category');
    }
}
