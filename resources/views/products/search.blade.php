@extends('products.index')

@section('paginate')
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="{{route('product.search',$search)}}" tabindex="-1">First </a>
      </li>
    @for($i=1;$i<$products->lastPage()+1;$i++)
      <li class="page-item {{ ($i==$products->currentPage()	)?'active':''}}">
        <a class="page-link" href="{{route('product.search',[$search,$i])}}">{{$i}}</a>
      </li>
    @endfor
      <!--<li class="page-item active">
        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>-->
      <li class="page-item">
        <a class="page-link" href="{{ route('product.search',[$search,$products->lastPage()]) }}">Last</a>
      </li>
    </ul>
@endsection