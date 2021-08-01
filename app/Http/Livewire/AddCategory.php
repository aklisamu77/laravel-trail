<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class AddCategory extends Component
{
    public $name;
    public $comments ;
    
    protected $rules = [
                "name"=>"required|alpha|unique:categories,cat_name",
                "comments"=>"required|max:1000"];
    
    public function submit(){
        $this->validate();
        $cat = new Category();
        $cat->cat_name =  $this->name;
        $cat->comments =  $this->comments;
        $cat->save();
        $this->emit('ChangePage', 1);
        session()->flash('message', 'Category successfully updated.');
    }
    
    public function render()
    {
        return view('livewire.add-category');
    }
}
