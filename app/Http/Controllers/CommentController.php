<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Pagination\Paginator;
use Validator;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {

    public function index()
    {
        Paginator::useBootstrap();
        return view("comment.index", [
            'comments' => Comment::orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

    public function show($id)
    {
         return view('comment.display', [
            'comment' => Comment::find($id)
        ]);
    }

}