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
            <form method="post" action="{{ route('category.store') }}">
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
                    <label for="Comment">{{ __('messages.Comment') }}</label>
                        <textarea name="comments" class="form-control" placeholder="Comment ...">{{old('comments')}}</textarea>
                    
                    @error('comments')
                        <small id="helpId" class="text-danger ">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" id=""
                    class="btn btn-primary btn-lg btn-block">{{ __('messages.Save') }}</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="row my-2 justify-content-end">
                <form class="form-inline my-2 my-lg-0" method="get" action="">
                    {{--@csrf--}}
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                    id="search-value" aria-label="Search">
                    <a href="{{route('search','search-key')}}" class="btn btn-outline-success my-2 my-sm-0 " id="searchbtn">Search</a>
                        
                </form>
                
            </div>
            <div class="row">
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Num. products</th>
                    <th scope="col" style=" width: 25%; ">Handle</th>
                  </tr>
                </thead>
                <tbody>
                
                @forelse($cats as $category)
                  <tr>
                    <th scope="row">{{ ($cats->currentPage()-1)*5 + $loop->iteration	 }}</th>
                    <td>{{ $category->cat_name }}</td>
                    <td>{{ $category->comments }}</td>
                    <td><a href="{{ route('product.category',$category->id) }}">{{ count($category->products) }}</a></td>
                    <td class="actions">
                        <form method="post" action="{{ route('category.destroy',$category->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                        
                        </form>
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-small btn-success">Edit</a>
                    </td>
                  </tr>
                @empty
                <tr>
                    <td colspan="4">No Records</td>
                  </tr>
                @endforelse
            
                </tbody>
              </table>
                {{-- $cats->links() --}}
                <nav aria-label="...">
                @section('paginate')
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="{{route('category')}}" tabindex="-1">First </a>
                  </li>
                @for($i=1;$i<$cats->lastPage()+1;$i++)
                  <li class="page-item {{ ($i==$cats->currentPage()	)?'active':''}}">
                    <a class="page-link" href="{{route('category.page',$i)}}">{{$i}}</a>
                  </li>
                @endfor
                  <!--<li class="page-item active">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                  <li class="page-item">
                    <a class="page-link" href="{{route('category.page',$cats->lastPage())}}">Last</a>
                  </li>
                </ul>
                @show
              </nav>
            </div>
                
            
             
        </div>
        
    </div>
    </div>



@endsection

