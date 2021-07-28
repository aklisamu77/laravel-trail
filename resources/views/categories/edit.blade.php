@extends('master')

@section("content")
    
    <br>
    
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="/category/{{ $category->id }}">
            {{--$errors--}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->cat_name }}" placeholder="Name">
                    @error('name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                    
                <div class="form-group">
                    <label for="Comment">Comment</label>
                        <textarea name="comments" class="form-control" placeholder="Comment ...">{{ $category->comments }}</textarea>
                    
                    @error('comments')
                        <small id="helpId" class="text-danger ">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" id="" class="btn btn-primary btn-lg btn-block">Save</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
        </div>
        
    </div>
    </div>
@endsection