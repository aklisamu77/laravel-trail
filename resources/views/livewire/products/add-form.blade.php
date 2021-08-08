
<form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" wire:submit.prevent="sddubmit">
            {{--$errors--}}
            
            @if(session()->has('message'))
                <div class="alert alert-danger m-2">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
                <div class="form-group">
                    <label for="Name">{{ __('messages.Name') }} </label>
                    <input type="text" name="name" wire:model.defer="currentProduct.name" class="form-control"
                     placeholder="Name">
                    @error('name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="Price">{{ __('messages.Price') }} </label>
                    <input type="number" step=".01" name="price" class="form-control" wire:model.defer="currentProduct.price"
                            placeholder="Price">
                    @error('price')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                <label for="Color">{{ __('messages.Color') }} </label>
                    <select class="form-select form-control" wire:model.defer="currentProduct.color" name="color" aria-label="Default select example">
                        <option value="red" {{ (old("color") == "red" ? "selected":"") }}>red</option>
                        <option value="blue" {{ (old("color") == "blue" ? "selected":"") }}>blue</option>
                        <option value="green" {{ (old("color") == "green" ? "selected":"") }}>green</option>
                        <option value="yellow" {{ (old("color") == "yellow" ? "selected":"") }}>yellow</option>
                        <option value="black" {{ (old("color") == "black" ? "selected":"") }}>black</option>
                            
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
                    </div>
                </div>
                    
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="active" value="1" id="flexCheckChecked" wire:model.defer="currentProduct.active">
                    <label class="form-check-label" for="flexCheckChecked">
                      Active
                    </label>
                </div>
                <div class="form-group">
                <label for="Category">{{ __('messages.Category') }} </label>
                    @section('select_category')
                        <select wire:model.defer="currentProduct.category" class="form-select form-control" name="category" aria-label="Default select example">
                    
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                            @endforeach
                        </select>
                    @show        
                    
                    @error('category')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                    
                <div class="form-group">
                <label for="Vendor">{{ __('messages.Vendor') }} </label>
                    @section('select_vendor')
                    <select class="form-select form-control" wire:model.defer="currentProduct.vendor" name="vendor" aria-label="Default select example">
                        @foreach($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                        
                            
                    </select>
                    @show  
                    @error('vendor')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" id=""
                    class="btn btn-primary btn-lg btn-block">{{ __('messages.Save') }}</button>
                </div>
            </form>