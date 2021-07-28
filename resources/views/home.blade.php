@extends('master')

@section('content')
    
    <div class="container">
    <br>
    <h2>Home</h2>
        <div class="row">
            <div class="col-md-6">
                @component('components.alert')
            that's sound work
            @slot('color')
                danger
            @endslot
        @endcomponent
        <x-alert>
            heloo from x
            <x-slot name="color">success</x-slot>
        </x-alert>
        
        <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
                
            </div>
            <div class="col-md-6">
                <x-card-component>
                    hi 1 2 3 
                    <x-slot name="title">Development</x-slot> 4 
                    <x-slot name="btn_msg">Click Me!</x-slot> 5
                    <x-slot name="url">https://google.com</x-slot>
                         5  7 8 
                </x-card-component>
            </div>
        </div>
        
    </div>
@endsection
    