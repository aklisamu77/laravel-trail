@extends('master')

@section("content")
    
    <br>
    <style>
        .prodimage{
            width: 100%;
            padding: 10px;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="{{route('vendor.update',$vendor->id )}}" enctype="multipart/form-data">
            {{--$errors--}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
            <div class="form-group">
                    <label for="Name">{{ __('messages.Name') }} </label>
                    <input type="text" name="name" class="form-control" value="{{$vendor->name}}"
                        placeholder="Name">
                    @error('name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
               
                <div class="form-group">        
                    <div class="mb-3">
                        <label for="formFile" class="form-label">{{ __('messages.Logo') }}</label>
                        <input class="form-control" type="file" name="logo" id="formFile">
                        @error('logo')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                        <img src="{{\Storage::url($vendor->logo)}}" class="prodimage">
                    </div>
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