<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $title }}</h5>
    <p class="card-text">{{ $slot }}</p>
    <a href="{{ $url ?? '#' }}" class="btn btn-primary">{{ $btn_msg ?? 'OK' }}</a>
  </div>
</div>