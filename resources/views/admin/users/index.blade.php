@extends('layouts.admin');

@section('content')

@if (Session::has('user_deleted'))
    <p class="bg-danger">{{session('user_deleted')}} </p>
@endif
    <h1>Users</h1>

    <div class="container-fluid">
    
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Photo</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Status</th>                            
                          <th>Created At</th>
                          <th>Updated at</th>                                                   
                          
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Photo</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Status</th>                            
                          <th>Created At</th>
                          <th>Updated at</th>                                                   
                          
                        </tr>
                      </tfoot>
                      <tbody>
                          @if ($users)
                          @foreach ($users as $user)
                          <tr>
                            <td>
                              {{$user->id}}
                            </td>
                            <td>
                              <a href="{{route('users.edit', $user->id)}} ">{{$user->name}}</a>                              
                            </td>
                            <td>
                              <img height="50" src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="No user photo">                              
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->role->name}}
                            </td>
                            <td>
                                {{$user->is_active == 1 ? "Active" : "Not active"}}
                            </td>
                            <td>
                                {{$user->created_at->diffForHumans()}}
                            </td>
                            <td>
                                {{$user->updated_at->diffForHumans()}}
                            </td>
                            
                          </tr>
                          @endforeach
                          @endif
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection