<div>
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
            <!-- add form -->
            @if ( $this->form == 'add' )
                @include('livewire.categories.add-category')
            <!-- edit form -->
            @elseif ( $this->form == 'edit' )
                @include('livewire.categories.edit')
            @endif
        </div>
        <div class="col-md-8">
             
<div class="row my-2 ">
    <div class="col-md-5">
        @if(session()->has('search-message'))
            <span class="">
                {{ session()->get('search-message') }}
            </span>
        @endif
        @if(session()->has('list-message'))
            <div class="alert alert-success pull-left">
                {{ session()->get('list-message') }}
            </div>
        @endif
    </div>
    
    <div class="col-md-2"></div>
    <div class="col-md-5"><form class="form-inline my-2 my-lg-0" method="get" action="">
                    {{--@csrf--}}
                    <input class="form-control mr-sm-2" wire:model.defer="search" type="search" name="search" placeholder="Search"
                    id="search-value" aria-label="Search">
                    <button wire:click="search" type="button" class="btn btn-outline-success my-2 my-sm-0 " >Search</button>
                        
                </form></div>

                
                
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
                    <th scope="row">{{($this->Cats()->currentPage()-1)*5 + $loop->iteration}}</th>
                    <td>{{ $category->cat_name }}</td>
                    <td>{{ $category->comments }}</td>
                    <td><a href="{{ route('product.category',$category->id) }}">{{ count($category->products) }}</a></td>
                    <td class="actions">
                        <form method="post" wire:submit.prevent="destroy({{$category->id}})" action="{{ route('category.destroy',$category->id) }}">
                            @csrf
                            @method('delete')
                           
                            <button type="submit" class="btn btn-small btn-danger mx-2"><i class="fa fa-trash fa-lg" style=" color: white; "></i></button>
                            
                        
                        </form>
                        <button  class="btn btn-small btn-success"
                            wire:click="Edit({{$category->id}})"><i class="fa fa-edit fa-lg" style=" color: white; "></i></button>
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
        
    </div>
    </div>
                </div>