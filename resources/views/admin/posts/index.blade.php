@extends('layouts.admin')

@section('content')
<div class="row">
  @if (Session::has('post-created-message'))
    <p class="bg-alert">{{session('post-created-message')}} </p>
@endif
</div>
    <div class="container-fluid">
    
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Id</th>
                          <th>User</th>
                          <th>Category</th>                          
                          <th>Title</th>
                          <th>Body</th>
                          <th>Created at</th>
                          <th>Updated at</th>
                          {{-- <th>Salary</th> --}}
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Photo</th>
                          <th>Id</th>
                          <th>User</th>
                          <th>Category</th>                          
                          <th>Title</th>
                          <th>Body</th>
                          <th>Created at</th>
                          <th>Updated at</th>
                          {{-- <th>Salary</th> --}}
                        </tr>
                      </tfoot>
                      <tbody>
                          @if ($posts)
                              
                          
                        @foreach ($posts as $post)
                        <tr>
                          <td>
                            <img height="100" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}" alt="">
                          </td>
                          <td>
                            {{$post->id}}
                          </td>
                          <td>
                            {{$post->user->name}}
                          </td>
                          <td>
                            {{$post->category_id}}
                          </td>
                          
                          <td>
                            {{$post->title}}
                          </td>
                          <td>
                            {{$post->body}}
                          </td>
                          <td>
                            {{$post->created_at->diffForHumans()}}
                          </td>
                          <td>
                            {{$post->updated_at->diffForHumans()}}
                          </td>
                          {{-- <td>
                            @can('view', post)
                            <form method="post" action="{{route('post.destroy', post->id)}} " enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            @endcan
                            
                          </td> --}}
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