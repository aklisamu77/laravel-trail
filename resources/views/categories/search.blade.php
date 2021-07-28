@extends('categories.index')

@section('paginate')
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="{{route('search',$search)}}" tabindex="-1">First </a>
      </li>
    @for($i=1;$i<$cats->lastPage()+1;$i++)
      <li class="page-item {{ ($i==$cats->currentPage()	)?'active':''}}">
        <a class="page-link" href="{{route('search.page',[$search,$i])}}">{{$i}}</a>
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
@endsection