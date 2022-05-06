@extends('layouts.app')
@section('content')
<div class="row">
       <div class="col">
              <a role="button" class="btn btn-outline-success" href="{{route('createPost')}}">New Post</a>
              <table class="table">
                     <thead>
                       <tr>
                         <th scope="col">#</th>
                         <th scope="col">Title</th>
                         <th scope="col">Comments</th>
                         <th scope="col">Author</th>
                         <th scope="col"></th>
                       </tr>
                     </thead>
                     @foreach ($posts as $post)
                     <tr>
                            <td>
                                   {{ $post->id }}
                            </td>
                            <td>
                                   <a class='text-decoration-none' href={{ route('post', ['id' => $post->id]) }} > {{$post->title}} </a>
                            </td>
                            <td>
                                   <a class='text-decoration-none' href={{ route('showComments', ['id' => $post->id]) }} > {{ $post->comments->count() }} </a>
                            </td>
                            <td>
                                    {{ $post->getAuthor->name }} 
                            </td>
                            <td>
                                   <div class="d-flex flex-row bd-highlight mb-3">
                                          <a role="button" class="btn btn-outline-primary" href="{{route('editPost', ['id' => $post->id ])}}"> Edit </a>
                                          <button class="btn btn-xs btn-danger deletePost" data-id="{{ $post->id }}">Del</button>
                                   </div>
                            </td>
                            
                     </tr>
                     @endforeach
              </table>
       </div>
</div>
<div class="row">
       <div class="mx-auto">
              {{ $posts->links() }}
       </div>
</div>
@endsection