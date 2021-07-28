@extends('master')

@section("content")
    
    <br>
    <style>
        .prodimage{
            width: 100%;
            padding: 10px;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="/product/{{ $product->id }}" enctype="multipart/form-data">
            {{--$errors--}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
            <div class="form-group">
                    <label for="Name">{{ __('messages.Name') }} </label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Name">
                    @error('name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="Price">{{ __('messages.Price') }} </label>
                    <input type="number" step=".01" name="price" class="form-control" value="{{$product->price}}"
                            placeholder="Price">
                    @error('price')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                <label for="Color">{{ __('messages.Color') }} </label>
                    <select class="form-select form-control" name="color" aria-label="Default select example">
                        <option value="red" {{ ($product->color == "red" ? "selected":"") }}>red</option>
                        <option value="blue" {{ ($product->color == "blue" ? "selected":"") }}>blue</option>
                        <option value="green" {{ ($product->color == "green" ? "selected":"") }}>green</option>
                        <option value="yellow" {{ ($product->color == "yellow" ? "selected":"") }}>yellow</option>
                        <option value="black" {{ ($product->color == "black" ? "selected":"") }}>black</option>
                            
                    </select>
                    @error('color')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">        
                    <div class="mb-3">
                        <label for="formFile" class="form-label">{{ __('messages.Logo') }}</label>
                        <input class="form-control" type="file" name="logo" id="formFile">
                        @error('logo')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                        <img src="{{\Storage::url($product->logo)}}" class="prodimage">
                    </div>
                </div>
                 
                <div class="form-group">
                    <input class="form-check-input"  value="1" type="checkbox" name="active"
                    @if ($product->active == 1)
                           checked
                    @endif   
                    id="flexCheckChecked" >
                    <label class="form-check-label" for="flexCheckChecked">
                      Active
                    </label>
                </div>
                <div class="form-group">
                <label for="Category">{{ __('messages.Category') }} </label>
                    <select class="form-select form-control" name="category" aria-label="Default select example">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                                {{ ($product->category_id == $cat->id ? "selected":"") }} >{{ $cat->cat_name }}</option>
                        @endforeach
                            
                    </select>
                    @error('category')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                    
                <div class="form-group">
                <label for="Vendor">{{ __('messages.Vendor') }} </label>
                    <select class="form-select form-control" name="vendor" aria-label="Default select example">
                        @foreach($vendors as $vendor)
                            <option value="{{ $vendor->id }}"
                                {{ ($product->vendor_id == $vendor->id ? "selected":"") }}>{{ $vendor->name }}</option>
                        @endforeach
                        
                            
                    </select>
                    @error('vendor')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" id="" class="btn btn-primary btn-lg btn-block">Save</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
        </div>
        
    </div>
    </div>
@endsection