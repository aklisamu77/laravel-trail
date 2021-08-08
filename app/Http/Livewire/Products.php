<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;


class Products extends Component
{
    protected $products;
    protected $categories ;
    protected $vendors ;
    public $currentPage =1 ;
    public $currentProduct;
    protected $rules = [
        "currentProduct.name"=>"required|unique:products,name",
        "currentProduct.price"=>"required|regex:/^\d+(\.\d{1,2})?$/",
        "currentProduct.color"=>"required|in:red,blue,green,yellow,black",
        "currentProduct.category"=>"required|exists:categories,id",
        "currentProduct.vendor"=>"required|exists:vendors,id",
        'currentProduct.logo' => 'required|mimes:png,jpg|max:2048'
];
    // initial 
    public function mount (){
         
         $this->currentProduct = new Product();
         $this->currentProduct->name = 'sdfsdfs';
         //dd($this->currentProduct);
    }
    
    public function getProducts(){
        return $this->products;
    }
    public function getCategories(){
        return $this->categories;
    }
    public function getVendors(){
        return $this->vendors;
    }
    // add new product
    public function submit(){
        $this->validate();
        session()->flash('message', 'Category successfully Created.');
        dd($this->currentProduct);
        session()->flash('message', 'Category successfully Created.');
    }
    // render 
    public function render()
    {
        $this->products = Product::orderBy('id', 'desc')->paginate(12,['*'], 'page',$this->currentPage);
        $this->categories = Category::get();
        $this->vendors = Vendor::get();
         
        return view('livewire.products');
    }
}
