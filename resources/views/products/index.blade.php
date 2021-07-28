@extends('master')

@section("content")
    <style>
    .card{
        overflow:hidden;
    }
        .actions *{
            transform:translateX(200px);
            transition: all .8s ease-in-out;
            display:inline-block;
        }
        .card:hover .actions *{
            transform:translateX(0px);
        }
        .card-img-top{
            max-height: 200px;
            width: auto;
            margin: 10px auto;
        }
    </style>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            {{--$errors--}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
                <div class="form-group">
                    <label for="Name">{{ __('messages.Name') }} </label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">
                    @error('name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="Price">{{ __('messages.Price') }} </label>
                    <input type="number" step=".01" name="price" class="form-control" value="{{old('price')}}"
                            placeholder="Price">
                    @error('price')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                <label for="Color">{{ __('messages.Color') }} </label>
                    <select class="form-select form-control" name="color" aria-label="Default select example">
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
                    <input class="form-check-input" type="checkbox" name="active" value="1" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Active
                    </label>
                </div>
                <div class="form-group">
                <label for="Category">{{ __('messages.Category') }} </label>
                    <select class="form-select form-control" name="category" aria-label="Default select example">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
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
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                        
                            
                    </select>
                    @error('vendor')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" id=""
                    class="btn btn-primary btn-lg btn-block">{{ __('messages.Save') }}</button>
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <div class="row my-2 justify-content-end">
                <form class="form-inline my-2 my-lg-0" method="get" action="">
                    {{--@csrf--}}
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                    id="search-value" aria-label="Search">
                    <a href="{{route('product.search','search-key')}}" class="btn btn-outline-success my-2 my-sm-0 " id="searchbtn">Search</a>
                        
                </form>
                
            </div>
            <div class="row">
            @forelse($products as $product)
            <div class="col-md-4 card-container">
                <div class="card  " style="auto;">
                    <img class="card-img-top" src="{{\Storage::url($product->logo)}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->name}}</h5>
                      <p class="card-text">
                      Color : {{ $product->color }}<br>
                      Price : {{ $product->price }}<br>
                      Category : {{ $product->category->cat_name }}<br>
                      Vendor : {{ $product->vendor->name }}<br>
                      Active : {{ $product->active }}</p>
                      <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                      <div class="actions">
                        <form method="post" action="{{ route('product.destroy',$product->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                        
                        </form>
                        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-small btn-success">Edit</a>
                    </div>
                    </div>
                </div>
            </div>
            @empty
                <span>No Records</span>
            @endforelse
            <br>
            </div>
                <div class="row">
            <br>
                {{-- $cats->links() --}}
                <nav aria-label="...">
                @section('paginate')
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="{{route('product')}}" tabindex="-1">First </a>
                  </li>
                @for($i=1;$i<$products->lastPage()+1;$i++)
                  <li class="page-item {{ ($i==$products->currentPage()	)?'active':''}}">
                    <a class="page-link" href="{{route('product',$i)}}">{{$i}}</a>
                  </li>
                @endfor
                  <!--<li class="page-item active">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                  <li class="page-item">
                    <a class="page-link" href="{{route('product',$products->lastPage())}}">Last</a>
                  </li>
                </ul>
                @show
              </nav>
            </div>
                
            
             
        </div>
        
    </div>
    </div>



@endsection

