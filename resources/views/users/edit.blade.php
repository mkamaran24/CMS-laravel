@extends('layouts.app')

@section('content')






<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">




                    @if(count($errors)>0)
                    <ul class="navbar-nav mr-auto">
                            @foreach ($errors->all() as $error)
                            <li class="nav-item active">
                                     {{$error}}
                                  </li>
                            @endforeach
                            
                          </ul>
                          @endif

                    

                        <form action="/user/update/{{$user->id}}" method="POST"  >
                        @csrf
                        
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter user name" value="{{$user->name}}">
                         </div>
                        
                         <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" name="email"  placeholder="Enter user email" value="{{$user->email}}">
                               </div>

                               <br>

                               <div class="form-check">
                                @foreach ($roles as $r)
                                <label class="form-check-label"  >
                                <input class="form-check-input" type="checkbox" name="role[]" value="{{$r->id}}" 
                                 
                                @foreach ($user->roles as $role)
                                @if ($r->id == $role->id)
                                    checked
                                @endif
                                @endforeach
                                                            
                                 >  {{$r->name}}  </label><br>
                                @endforeach
                               
                                
                            </div>

                            <br>
                           
                         
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>      
                    







                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- 
@foreach ($posts->tags as $ta)
@if ($tag->id == $ta->id)
    checked
@endif
@endforeach --}}