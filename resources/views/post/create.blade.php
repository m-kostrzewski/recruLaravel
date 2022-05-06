@extends('layouts.app')
@section('content')
<div class="offset-3 col-5">
   <div class="card-deck">
      <div class="card">
         <div class="card-body">
            <form method="POST" action="{{ route('storePost') }}">
               @csrf
               <label for="titleInput">Title</label>
               <input name='title' type="text" class="form-control" id="titleInput" placeholder="Your Title">

               <label for="contentBox">Content</label>
               <textarea name='content' class="form-control" placeholder="Wirte something ..." rows='10'> </textarea>

               <input type="submit" class="btn btn-success" value="Submit" />
            </form>
         </div>
      </div>
   </div>
</div>
@endsection