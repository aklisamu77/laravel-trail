<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    //public $cats;
    public $currentPage = 1 ;
    protected $cats;
    //protected $listeners = ['ChangePage'];
    public $name;
    public $comments ;
    public $form='add';
    public $category = null;
    public $search; 
    
    protected $rules = [
                "name"=>"required|alpha|unique:categories,cat_name",
                "comments"=>"required|max:1000"];
    
    // add new category 
    public function submit(){
        $this->validate();
        $cat = new Category();
        $cat->cat_name =  $this->name;
        $cat->comments =  $this->comments;
        $cat->save();
        //$this->emit('ChangePage', 1);
        session()->flash('message', 'Category successfully Created.');
    }
    // remove
    public function destroy($id){
        //
        $category = Category::findorFail($id);
        $category->delete();
        session()->flash('list-message', 'Category '.$category->cat_name.' successfully Deleted. ');
        
    }
    // show edit form insted of add
    public function Edit($id){
        $this->form='edit';
        $this->category     = Category::findorFail($id);
        $this->name         = $this->category->cat_name;
        $this->comments     = $this->category->comments;
    }
    
    public function addform(){
        $this->form='add';
        $this->category     = null;
        $this->name         = null;
        $this->comments     = null;
    }
    // update
    public function update($id){
        $this->validate();
        $cat  = Category::findorFail($id);
        $cat->cat_name  = $this->name;
        $cat->comments  = $this->comments;
        $cat->save();
        $this->category     = Category::findorFail($id);
        session()->flash('message', 'Category successfully updated.');
    }
    
    // search
    public function search(){
        session()->flash('search-message', 'Search results for : '.$this->search);
    }
    
    // render with page 
    public function render(){
        if ($this->search !=null)
                $this->cats =  Category::where('cat_name','like','%'.$this->search.'%')
                                ->paginate(3,['*'], 'page',$this->currentPage);
        else $this->cats = Category::orderBy('id', 'desc')->paginate(5,['*'], 'page',$this->currentPage);
        
        return view('livewire.category-list');
    }
    
    public function Cats(){
        return $this->cats;
    }
    public function ChangePage($id ){
        $this->currentPage = $id;
    }
}
