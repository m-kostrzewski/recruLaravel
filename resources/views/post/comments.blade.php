@extends('layouts.app')
@section('content')
<div class="row">
    <div class="offset-3 col-6">
        <ul class="list-group">
            @foreach ($comments as $comment)
                <li class="list-group-item"> {{ $comment->getAuthor->name }} : {{ $comment->content }} </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection