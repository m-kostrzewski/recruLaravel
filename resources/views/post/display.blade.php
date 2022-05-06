@extends('layouts.app')
@section('content')
<div class="offset-4 col-3">
       <div class="card-deck">
              <div class="card">
                     
                <div class="card-body">
                  <h5 class="card-title"> {{ $post->title }} </h5>
                  <p class="card-text"> {{ $post->content }} </p>
                  <p class="card-text"><small class="text-muted"> {{ $post->created_at }} </small></p>
                  <p class="card-text"><small class="text-muted"> Author: {{ $post->getAuthor->name }} </small></p>
                </div>
              </div>
              <div class="d-flex flex-row bd-highlight mb-3">
                     <a role="button" class="btn btn-outline-primary" href="{{route('editPost', ['id' => $post->id ])}}"> Edit </a>
                     <button class="btn btn-xs btn-danger deletePost" data-id="{{ $post->id }}">Del</button>
              </div>
       </div>
</div>
@endsection