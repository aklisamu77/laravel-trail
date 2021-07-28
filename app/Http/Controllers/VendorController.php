<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($currentPage=1)
    {
        //
        $vendors = Vendor::orderBy('id', 'desc')->paginate(6,['*'], 'page',$currentPage);
        //dd($vendors);
        
        return view('vendors.index' , ["vendors"=>$vendors]);
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
                            "logo" => "required|mimes:png,jpg|max:2048"
                            
                            
                    ]);
        // save logo file
        $fileName = time().'_'.str_replace(' ','-',$request->logo->getClientOriginalName());
        $filePath = $request->file('logo')->storeAs('uploads/vendors', $fileName, 'public');
        //dd($request->all());
        // store 
        $vendor = new Vendor();
        $vendor->name          = $request->name;
        $vendor->logo          = $filePath;
        
        $vendor->save();
        return redirect('/vendor')->with('message', 'Vendor Created!');
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
        $vendors = Vendor::findorFail($id);
        
        return view('vendors.edit' , ["vendor"=>$vendors]);
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
                            "name"      =>"required|unique:products,name,$id",
                            "logo"      =>"mimes:png,jpg|max:2048|nullable"
                    ]);
        
        
        $vendor = Vendor::findorFail($id);
        $vendor->name          = $request->name;
        if (isset($request->logo) &&  $request->logo !=null){
            $fileName = time().'_'.str_replace(' ','-',$request->logo->getClientOriginalName());
            $filePath = $request->file('logo')->storeAs('uploads/vendors', $fileName, 'public');
            $vendor->logo          = $filePath;
        }
        $vendor->save();
        Session::flash('message', 'Vendor Updated!'); 
        return redirect(route('vendor.edit',$id));
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
        $Vendor = Vendor::findorFail($id);
        $Vendor->delete();
        return redirect('/vendor');
    }
    
    public function search($search,$pageid=1){
        $rslt = Vendor::where('name','like','%'.$search.'%')->paginate(1,['*'], 'page',$pageid);
        //dd($search);
        return view('vendors.search' , ["vendors"=>$rslt,'search'=>$search]);
        
    }
}
