<form method="post" action="{{ route('category.store') }}" wire:submit.prevent="submit">
            {{--$errors--}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
                <div class="form-group">
                    <label for="Name">{{ __('messages.Name') }} </label>
                    <input type="text" wire:model="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">
                    @error('name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                    
                <div class="form-group">
                    <label for="Comment">{{ __('messages.Comment') }}</label>
                        <textarea wire:model="comments" name="comments" class="form-control" placeholder="Comment ...">{{old('comments')}}</textarea>
                    
                    @error('comments')
                        <small id="helpId" class="text-danger ">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" id=""
                    class="btn btn-primary btn-lg btn-block">{{ __('messages.Save') }}</button>
                </div>
            </form>
