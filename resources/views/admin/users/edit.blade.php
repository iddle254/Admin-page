@extends('layouts.admin')

@section('content')
    <h1>Edit {{$user->name}}</h1>
    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}} " alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
     {!!Form::model($user, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true])!!}
     <div class="form-group">
         {!!Form::label('name', 'Name:')!!}
         {!!Form::text('name', null, ['class'=>'form-control'])!!}
     </div>

     <div class="form-group">
        {!!Form::label('email', 'Email:')!!}
        {!!Form::email('email', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('role_id', 'Role:')!!}
        {!!Form::select('role_id', [''=>'Choose options'] + $roles, null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('is_active', 'Status:')!!}
        {!!Form::select('is_active', array(1=> 'Active', 0=>'Not active'), null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('photo_id', 'File:')!!}
        {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('password', 'Password:')!!}
        {!!Form::password('password', ['class'=>'form-control'])!!}
    </div>

     <div class="form-group">
        {!!Form::submit('Edit User', ['class'=> 'btn btn-primary col-sm-6']) !!}
     </div>

     {!!Form::close()!!}

      {!!Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminUsersController@destroy',$user->id]])!!}
          
          <div class="form-group">
             {!!Form::submit('Delete user', ['class'=> 'btn btn-danger col-sm-6']) !!}
          </div>
          {!!Form::close()!!}

          

     @include('includes.form_error')
    </div>
    
@endsection