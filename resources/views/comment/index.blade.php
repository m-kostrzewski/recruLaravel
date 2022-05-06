@extends('layouts.app')
@section('content')
<div class="row">
       <div class="col">
              <table class="table">
                     <thead>
                       <tr>
                         <th scope="col">#</th>
                         <th scope="col">Post</th>
                         <th scope="col">Comment content</th>
                         <th scope="col">Author</th>
                         <th scope="col"></th>
                       </tr>
                     </thead>
                     @foreach ($comments as $comment)
                     <tr>
                            <td>
                                   {{ $comment->id }}
                            </td>
                            <td>
                                   <a class='text-decoration-none' href={{ route('post', ['id' => $comment->post_id]) }} > {{ $comment->getPost->title }} </a>
                            </td>
                            <td>
                                <a class='text-decoration-none' href={{ route('comment', ['id' => $comment->id]) }} > {{ $comment->content }} </a>
                            </td>
                            <td>
                                {{ $comment->getAuthor->name }} 
                            </td>
                            
                     </tr>
                     @endforeach
              </table>
       </div>
</div>
<div class="row">
       <div class="mx-auto">
              {{ $comments->links() }}
       </div>
</div>
@endsection