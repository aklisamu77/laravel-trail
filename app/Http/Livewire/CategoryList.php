<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    //public $cats;
    public $currentPage = 1 ;
    protected $cats;
    protected $listeners = ['ChangePage'];
    public function render()
    {
        
        
        $this->cats = Category::orderBy('id', 'desc')->paginate(5,['*'], 'page',$this->currentPage);
            //Category::all();
        //dd($this->cats);
        return view('livewire.category-list');
    }
    
    public function Cats(){
        return $this->cats;
    }
    public function ChangePage($id ){
        $this->currentPage = $id;
    }
}
