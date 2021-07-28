@extends('products.index')

@section('breadcupms')
        <h3>
            <a href="{{route('product')}}">Products</a>
                >
            <a href="{{route('product.category',$category->id)}}">{{$category->cat_name}}</a>
                ( {{$products->currentPage()}} / {{ $products->lastPage() }} )
        </h3>
            
@endsection

@section('select_category')
    <select class="form-select form-control" onclick="return false;" readonly disabled aria-label="Default select example">
                    
        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
    </select>
    <input type="hidden" value="{{ $category->id }}" name ="category">   
@endsection

@section('paginate')
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="{{route('product.category',$category->id)}}" tabindex="-1">First </a>
        </li>
        @for($i=1;$i<$products->lastPage()+1;$i++)
            <li class="page-item {{ ($i==$products->currentPage()	)?'active':''}}">
                <a class="page-link" href="{{route('product.category',[$category->id,$i])}}">{{$i}}</a>
            </li>
        @endfor
        <!--<li class="page-item active">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <li class="page-item">
          <a class="page-link" href="{{route('product.category',[$category->id,$products->lastPage()])}}">Last</a>
        </li>
    </ul>
@endsection