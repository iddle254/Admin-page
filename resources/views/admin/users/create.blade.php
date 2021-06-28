@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

    {{-- <form method="post" action="{{route('users.store')}} " enctype="multipart/form-data">
     @csrf
     <div class="form-group">
     <label for="formGroupExampleInput">Example label</label>
     <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
     </div>
     <div class="form-group">
     <label for="formGroupExampleInput2">Another label</label>
     <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
     </div>
     </form> --}}

     {!!Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true])!!}
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
        {!!Form::select('is_active', array(1=> 'Active', 0=>'Not active'), 0, ['class'=>'form-control'])!!}
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
        {!!Form::submit('Create User', ['class'=> 'btn btn-primary']) !!}
     </div>
     {!!Form::close()!!}

     @include('includes.form_error')
    
@endsection