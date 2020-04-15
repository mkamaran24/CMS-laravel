@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">index</div>

                <div class="card-body">
                
                       
                <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categ as $c)
                            <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{$c->name}}</td>
                            <td>
                                  <a href="/category/edit/{{$c->id}}">Edit</a>
                            </td>
                            <td>
                                  <a href="/category/delete/{{$c->id}}">Delete</a>
                            </td>
                            </tr>
                            <tr>
                           @endforeach
                        </tbody>
                    </table> 
                 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
