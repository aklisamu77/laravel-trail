<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{
    public $currentPage = 1 ;
    protected $orders;
    //protected $listeners = ['ChangePage'];
    public $form='add';
    public $singleOrder = null;
    public $search; 
    
    public function render()
    {
        if ($this->search !=null)
                $this->orders =  Order::where('name','like','%'.$this->search.'%')
                                ->paginate(3,['*'], 'page',$this->currentPage);
        else $this->orders = Order::orderBy('id', 'desc')->paginate(12,['*'], 'page',$this->currentPage);
        return view('livewire.orders');
    }
    
    // remove
    public function destroy($id){
        //
        $order = Order::findorFail($id);
        $order->delete();
        session()->flash('list-message', 'Order #'.$order->id.' successfully Deleted. ');
        
    }
    
    public function Orders(){
        return $this->orders;
    }
    
    public function status_color($status){
        $arr= array(
                    'Canceled'=>'danger',
                    'Rejected'=>'danger',
                    'Pinding'=>'warning',
                    'Proccing'=>'info',
                    'Accepted'=>'success',
                    'shipped'=>'primary',
                    );
        return isset($arr[$status])?$arr[$status]:'danger';
    }
    
}
