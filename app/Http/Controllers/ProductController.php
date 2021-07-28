<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Session;
//use Illuminate\Support\Facades\Hash;

use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($currentPage=1)
    {
        //
        //echo Hash::make('123');
        $products = Product::orderBy('id', 'desc')->paginate(12,['*'], 'page',$currentPage);
        $categories = Category::get();
        $vendors = Vendor::get();
        //dd($vendors);
        
        return view('products.index' , [
                                        "page_route"=>'product',
                                        "products"=>$products,
                                        "categories"=>$categories,
                                        "vendors"=>$vendors]);
    }
    
    public function categoryShow($category_id,$currentPage=1){
        //
        $selected_category = Category::find($category_id);
        $products = $selected_category->products()->orderBy('id', 'desc')->paginate(3,['*'], 'page',$currentPage);
        //dd(Category::find($category_id)->id);
        $categories = Category::get();
        $vendors = Vendor::get();
        //dd($vendors);
        
        return view('products.category' , [
                                        "category"=>$selected_category,
                                        "products"=>$products,
                                        "categories"=>$categories,
                                        "vendors"=>$vendors]);
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
        
        $validation = $request->validate([
                            "name"=>"required|unique:products,name",
                            "price"=>"required|regex:/^\d+(\.\d{1,2})?$/",
                            "color"=>"required|in:red,blue,green,yellow,black",
                            "category"=>"required|exists:categories,id",
                            "vendor"=>"required|exists:vendors,id",
                            'logo' => 'required|mimes:png,jpg|max:2048'
                            
                            
                    ]);
        // save logo file
        $fileName = time().'_'.str_replace(' ','-',$request->logo->getClientOriginalName());
        $filePath = $request->file('logo')->storeAs('uploads/products', $fileName, 'public');
        //dd($request->all());
        // store 
        $product = new Product();
        $product->name          = $request->name;
        $product->price         = $request->price;
        $product->color         = $request->color;
        $product->category_id   = $request->category;
        $product->vendor_id     = $request->vendor;
        
        $product->logo          = $filePath;
        
        if (isset($request->active) && $request->active==1)
            $product->active = 1;
        
        $product->save();
        return redirect('/product')->with('message', 'Product Created!');
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
        //
        $product = Product::findorFail($id);
        $categories = Category::get();
        $vendors = Vendor::get();
        
        return view('products.edit' , ["product"=>$product,
                                       "categories"=>$categories,
                                        "vendors"=>$vendors]);
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
        //dd($request->all());
        $validation = $request->validate([
                            "name"      =>"required|unique:products,name,$id",
                            "price"     =>"required|regex:/^\d+(\.\d{1,2})?$/",
                            "color"     =>"required|in:red,blue,green,yellow,black",
                            "category"  =>"required|exists:categories,id",
                            "vendor"    =>"required|exists:vendors,id",
                            "logo"      =>"mimes:png,jpg|max:2048|nullable"
                    ]);
        
        
        $product = Product::findorFail($id);
        $product->name          = $request->name;
        $product->price         = $request->price;
        $product->color         = $request->color;
        $product->category_id   = $request->category;
        $product->vendor_id     = $request->vendor;
        if (isset($request->logo) &&  $request->logo !=null){
            $fileName = time().'_'.str_replace(' ','-',$request->logo->getClientOriginalName());
            $filePath = $request->file('logo')->storeAs('uploads/products', $fileName, 'public');
            $product->logo          = $filePath;
        }
        
        
        if (isset($request->active) && $request->active==1)
            $product->active = 1;
        else $product->active = 0;
        $product->save();
        Session::flash('message', 'Product Updated!'); 
        return redirect(route('product.edit',$id));
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
        $Product = Product::findorFail($id);
        $Product->delete();
        return redirect('/product');
    }
    
    public function search($search,$pageid=1){
        $categories = Category::get();
        $vendors = Vendor::get();
        $rslt = Product::where('name','like','%'.$search.'%')->paginate(1,['*'], 'page',$pageid);
        //dd($search);
        return view('products.search' , ["products"=>$rslt,'search'=>$search,
                                         "categories"=>$categories,
                                        "vendors"=>$vendors]);
        
    }
}
