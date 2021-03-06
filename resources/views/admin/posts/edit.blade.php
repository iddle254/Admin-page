@extends('layouts.admin')

@section('content')
    <h1>Edit {{$post->title}}</h1>

    <div class="row">

     {!!Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminPostsController@update', $post->id], 'files'=>true])!!}
         <div class="form-group">
             {!!Form::label('title', 'Title:')!!}
             {!!Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!!Form::label('category_id', 'Category:')!!}
            {!!Form::select('category_id', array(''=>'Choose a category')+$categories, null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('photo_id', 'Category:')!!}
            {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('body', 'Description:')!!}
            {!!Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}
        </div>
    
         <div class="form-group">
            {!!Form::submit('Edit Post', ['class'=> 'btn btn-primary col-sm-6']) !!}
         </div>
         {!!Form::close()!!}

         {!!Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminPostsController@destroy',$post->id]])!!}
          
         <div class="form-group">
            {!!Form::submit('Delete post', ['class'=> 'btn btn-danger col-sm-6']) !!}
         </div>
         {!!Form::close()!!}
        </div>

         <div class="row">
            @include('includes.form_error')
         </div>
@endsection