@extends('layouts.app')
@section('content')
<div class="offset-3 col-5">
       <div class="card-deck">
              <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('updatePost', $post->id) }}">
                     @method('put')
                     @csrf
                     Title
                    <input name="title" class="form-control mt-2" type="text" value="{{$post->title}}"/>
                    Content
                    <textarea name="content" rows='10' class="form-control mt-2" type="text" >{{$post->content}}</textarea>
                    <input type="submit" class="btn btn-success mt-2" value="Save" />
                </form>
              </div>
        
       </div>
</div>
@endsection