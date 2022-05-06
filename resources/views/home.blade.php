@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @auth
            <div class="col">
                You are logged in
            </div>
        @endauth
</div>
@endsection
