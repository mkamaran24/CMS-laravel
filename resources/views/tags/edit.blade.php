@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tags | {{$tags->tag}} </div>

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
                          
                          
                  
                <form action="/tag/update/{{$tags->id}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        
                      

                        <div class="form-group">
                            <label for="title">Tag</label>
                            <input type="text" class="form-control" name="tag" value="{{$tags->tag}}">
                        </div>
                        
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
