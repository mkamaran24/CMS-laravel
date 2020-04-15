@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post | {{$posts->title}} </div>

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
                          
                          
                  
                <form action="/post/update/{{$posts->id}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        
                      <div class="form-group">
                            <label for="categ">Category</label>
                            <select class="form-control" name="categ_id" id="categ">
                              
                              @foreach($categ as $c)
                              @if ($c->id == $posts->category_id)
                              <option value="{{$c->id}}" selected>{{$c->name}}</option>
                              @else
                              <option value="{{$c->id}}" >{{$c->name}}</option>
                              @endif
                              @endforeach
                             
                            </select>
                        </div>

                        <div class="form-check">
                            @foreach ($tags as $tag)
                            <label class="form-check-label"  >
                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" 
                             
                            @foreach ($posts->tags as $ta)
                            @if ($tag->id == $ta->id)
                                checked
                            @endif
                            @endforeach
                             >  {{$tag->tag}}  </label><br>
                            @endforeach
                           
                            
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$posts->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" rows="3" value="">
                                {{$posts->content}}
                            </textarea>
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
