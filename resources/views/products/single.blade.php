<div class="col-md-4 card-container">
                <div class="card  " style="auto;">
                    <img class="card-img-top" src="{{\Storage::url($product->logo)}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->name}}</h5>
                      <p class="card-text">
                      Color : {{ $product->color }}<br>
                      Price : {{ $product->price }}<br>
                      Category : {{ $product->category->cat_name }} ({{$product->category->products->count()}})<br>
                      Vendor : {{ $product->vendor->name }} ({{$product->vendor->products->count()}})<br>
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