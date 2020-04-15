@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">index</div>

                <div class="card-body">
                   
                    @if ($tags->count()>0)

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $c)
                            <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{$c->tag}}</td>
                          
                            <td>
                                  <a href="/tag/edit/{{$c->id}}">Edit</a>
                            </td>
                            <td>
                                  <a href="/tag/delete/{{$c->id}}">Delete</a>
                            </td>
                            
                            <tr>
                           @endforeach
                        </tbody>
                    </table> 
                        
                    @else

                    <p>No Posts to show</p>
                        
                    @endif
                       
                
                 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
