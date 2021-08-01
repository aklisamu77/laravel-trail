<div>
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
                
                @forelse($this->Cats() as $category)
                  <tr>
                    <th scope="row">{{-- ($cats->currentPage()-1)*5 + $loop->iteration	 --}}</th>
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
                    <button class="page-link" wire:click="ChangePage(1)" tabindex="-1">First </button>
                  </li>
                @for($i=1;$i<$this->Cats()->lastPage()+1;$i++)
                  <li class="page-item {{ ($i==$this->Cats()->currentPage()	)?'active':''}}">
                    <button class="page-link" wire:click="ChangePage({{$i}})">{{$i}}</button>
                  </li>
                @endfor
                  <!--<li class="page-item active">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                  <li class="page-item">
                    <button class="page-link" wire:click="ChangePage({{$this->Cats()->lastPage()}})">Last</button>
                  </li>
                </ul>
                @show
              </nav> 
            </div>
                </div>