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
        .card-img-top{
            width: 100px;
    border-radius: 10px;
        }
    </style>
    <br>
    <div class="container">
    <div class="row">
        @section('breadcupms')
        <h3>
            <a href="{{route('vendor')}}">Vendors</a>
                ( {{$vendors->currentPage()}} / {{ $vendors->lastPage() }} )
        </h3>
        @show
    </div>
    <div class="row">
    
        <div class="col-md-3">
                @include('vendors.add-form')

        </div>
        <div class="col-md-9">
            <div class="row my-2 justify-content-end">
                <form class="form-inline my-2 my-lg-0" method="get" action="">
                    {{--@csrf--}}
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                    id="search-value" aria-label="Search">
                    <a href="{{route('vendor.search','search-key')}}" class="btn btn-outline-success my-2 my-sm-0 " id="searchbtn">Search</a>
                        
                </form>
                
            </div>
            <div class="row">
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Num. products</th>
                    <th scope="col" style=" width: 25%; ">Handle</th>
                  </tr>
                </thead>
                <tbody>
                
                @forelse($vendors as $vendor)
                  <tr>
                    <th scope="row">{{ ($vendors->currentPage()-1)*5 + $loop->iteration	 }}</th>
                    <td>{{ $vendor->name }}</td>
                    <td>
                        <img class="card-img-top" src="{{\Storage::url( $vendor->logo )}}" alt="Card image cap">
                    </td>
                    <td><a href="{{ route('product.vendor',$vendor->id) }}">{{ count($vendor->products) }}</a></td>
                    <td class="actions">
                        <form method="post" action="{{ route('vendor.destroy',$vendor->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                        
                        </form>
                        <a href="{{ route('vendor.edit',$vendor->id) }}" class="btn btn-small btn-success">Edit</a>
                    </td>
                  </tr>
                @empty
                <tr>
                    <td colspan="4">No Records</td>
                  </tr>
                @endforelse
            
                </tbody>
              </table>
            </div>
            <br>
            
            <div class="row">
                <br>
                {{-- $cats->links() --}}
                <nav aria-label="...">
                    @section('paginate')
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{route('vendor')}}" tabindex="-1">First </a>
                            </li>
                            @for($i=1;$i<$vendors->lastPage()+1;$i++)
                                <li class="page-item {{ ($i==$vendors->currentPage()	)?'active':''}}">
                                    <a class="page-link" href="{{route('vendor',$i)}}">{{$i}}</a>
                                </li>
                            @endfor
                            <!--<li class="page-item active">
                              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                            <li class="page-item">
                              <a class="page-link" href="{{route('vendor',$vendors->lastPage())}}">Last</a>
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

