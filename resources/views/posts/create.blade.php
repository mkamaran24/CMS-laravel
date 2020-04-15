@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>

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
                          
                          
                  
                <form action="/post/store" method="POST" enctype="multipart/form-data">
                      @csrf
                        
                      <div class="form-group">
                            <label for="categ">Category</label>
                            <select class="form-control" name="categ_id" id="categ">
                              
                              @foreach($categ as $c)

                              <option value="{{$c->id}}">{{$c->name}}</option>
               
                              @endforeach
                             
                            </select>
                        </div>
                         
                        <div class="form-check">
                          
                            @foreach($tags as $t)

                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{$t->id}}" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                {{$t->tag}}
                            </label>
                            <br>
             
                            @endforeach
                          </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Photo</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
