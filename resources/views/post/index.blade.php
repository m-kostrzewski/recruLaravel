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
                                   <a href={{ route('post', ['id' => $post->id]) }} > {{$post->title}} </a>
                            </td>
                            <td>
                                   {{ $post->comments->count() }}
                            </td>
                            <td>
                                    {{ $post->getAuthor->name }} 
                            </td>
                            <td>
                                   <div class="d-flex flex-row bd-highlight mb-3">
                                          <a role="button" class="btn btn-outline-primary" href="{{route('editPost', ['id' => $post->id ])}}"> Edit </a>
                                          <form action="{{ route('deletePost', $post->id) }}" method="POST">
                                                 @method('delete')
                                                 @csrf
                                                 <input type='submit'
                                                        class="btn btn-xs btn-danger" 
                                                        onclick="return confirm('Are you sure?')" 
                                                        value='Del' />
                                          </form>
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