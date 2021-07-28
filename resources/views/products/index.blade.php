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
        @section('breadcupms')
        <h3>
            <a href="{{route('product')}}">Products</a>
                ( {{$products->currentPage()}} / {{ $products->lastPage() }} )
        </h3>
        @show
    </div>
    <div class="row">
    
        <div class="col-md-3">
                @include('products.add-form') 

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
                        @include('products.single',['product'=>$product]) 
            
                        @if ( $loop->index %3 == 2  ) 
                            </div><div class="row my-2">
                        @endif
                @empty
                    <span>No Records</span>
                @endforelse
            </div>
            <br>
            
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
        </div> <!-- remove -->
                
            
             
        </div>
        
    </div>
    </div>



@endsection

