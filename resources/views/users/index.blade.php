@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users |index</div>

                <div class="card-body">
                   
                    @if ($users->count()>0)

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">images</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Roles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $c)
                            <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{$c->name}}</td>
                            <td><img src="https://c7.uihere.com/files/136/22/549/user-profile-computer-icons-girl-customer-avatar.jpg" height="70" width="70"></td>
                            <td>
                                  
                                     {{-- @if ($c->admin)
                                     <a href="/user/notadmin/{{$c->id}}">Delete Admin</a>
                                     @else
                                         <a href="/user/admin/{{$c->id}}">Make Admin</a>
                                     @endif --}}
                                   
                                     <a href="/user/edit/{{$c->id}}">Edit</a>
                                  
                            </td>
                            <td>
                                  @foreach ($c->roles as $role)
                                      {{$role->display_name}}
                                  @endforeach
                            </td>
                            
                            <tr>
                           @endforeach
                        </tbody>
                    </table> 
                        
                    @else

                    <p>No Users to show</p>
                        
                    @endif
                       
                
                 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
