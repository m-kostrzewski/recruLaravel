@extends('layouts.app')
@section('content')
<div class="col">
    <form method="POST" action="register">
        @csrf
        <div class="form-group row">
        <div class="col-sm-10 mt-2">
            <input name="username" type="text" class="form-control form-control-lg" placeholder="Username">
        </div>
        <div class="col-sm-10 mt-2">
            <input name="email" type="email" class="form-control form-control-lg" placeholder="E-mail">
        </div>
        @if($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <div class="col-sm-10 mt-2">
            <input name="password" type="password" class="form-control form-control-lg" placeholder="Password">
        </div>
        <div class="col-sm-10 mt-2">
            <input name="password2" type="password" class="form-control form-control-lg" placeholder="Password">
        </div>
        @if($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <div class="col-sm-10 mt-2">
            <input type="submit" class="btn btn-outline-success" value="Submit">
        </div>
        </div>
    </form>
</div>
@endsection