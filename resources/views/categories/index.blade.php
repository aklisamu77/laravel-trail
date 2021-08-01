@extends('master')

@section("content")
    <style>
    td{
        overflow:hidden;
    }
        .actions *{
            transform:translateX(200px);
            transition: all .8s ease-in-out;
            display:inline-block;
        }
        tr:hover .actions *{
            transform:translateX(0px);
        }
    </style>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <livewire:add-category>
        </div>
        <div class="col-md-8">
             
            @livewire('category-list')
                
            
             
        </div>
        
    </div>
    </div>



@endsection

