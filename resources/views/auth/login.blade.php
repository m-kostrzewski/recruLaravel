@extends('layouts.app')
@section('content')
<div class="col">
    <form method="POST" action="login">
        @csrf
        <div class="form-group row">
        <div class="col-sm-10">
            <input name="email" type="email" class="form-control form-control-lg" placeholder="E-mail">
        </div>
        <div class="col-sm-10">
            <input name="password" type="password" class="form-control form-control-lg" placeholder="Password">
        </div>
        <div class="col-sm-10">
            <input type="submit" class="btn btn-outline-success" placeholder="Submit">
        </div>
        </div>
    </form>
</div>
@endsection