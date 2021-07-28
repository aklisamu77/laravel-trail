<form method="post" action="{{ route('vendor.store') }}" enctype="multipart/form-data">
            {{--$errors--}}
            
            @if(session()->has('message'))
                <div class="alert alert-success m-2">
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
                    <div class="mb-3">
                        <label for="formFile" class="form-label">{{ __('messages.Logo') }}</label>
                        <input class="form-control" type="file" name="logo" id="formFile">
                        @error('logo')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                    
                <div class="form-group">
                    <button type="submit" name="submit" id=""
                    class="btn btn-primary btn-lg btn-block">{{ __('messages.Save') }}</button>
                </div>
            </form>