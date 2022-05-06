@extends('layouts.app')
@section('content')
<div class="row">
       <div class="col">
              <table class="table">
                     <thead>
                       <tr>
                         <th scope="col">#</th>
                         <th scope="col">User</th>
                         <th scope="col">Posts</th>
                         <th scope="col">Comments</th>
                         <th scope="col"></th>
                       </tr>
                     </thead>
                     @foreach ($users as $user)
                     <tr>
                            <td>
                                   {{ $user->id }}
                            </td>
                            <td>
                                   {{ $user->name }}
                            </td>
                            <td>
                                   {{ $user->getPosts->count() }}
                            </td>
                            <td>
                                   {{ $user->getComments->count() }} 
                            </td>
                            
                     </tr>
                     @endforeach
              </table>
       </div>
</div>
<div class="row">
       <div class="mx-auto">
              {{ $users->links() }}
       </div>
</div>
@endsection