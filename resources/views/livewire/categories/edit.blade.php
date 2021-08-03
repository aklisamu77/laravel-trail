 <form method="post" action="/category/{{ $category->id }}" wire:submit.prevent="update({{$category->id}})">
 <h3>Edit Category : {{ $category->cat_name }}</h3>
            {{--$errors--}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" wire:model.defer="name" class="form-control" value="{{ $category->cat_name }}" placeholder="Name">
                    @error('name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                    
                <div class="form-group">
                    <label for="Comment">Comment</label>
                        <textarea name="comments" wire:model.defer="comments" class="form-control" placeholder="Comment ...">{{ $category->comments }}</textarea>
                    
                    @error('comments')
                        <small id="helpId" class="text-danger ">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" id="" class="btn btn-primary btn-lg btn-block">Save</button>
                </div>
                <div class="form-group">
                    <span wire:click="addform" style=" color: #2176bd; text-decoration: underline; cursor: pointer; "> + add new category</span>
                </div>
            </form>
        