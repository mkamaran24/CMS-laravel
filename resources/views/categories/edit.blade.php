@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

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
                  
                <form action="/category/update/{{$cat->id}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$cat->name}}">
                        </div>
                       
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
