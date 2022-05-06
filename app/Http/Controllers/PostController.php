<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Pagination\Paginator;
use Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    public function index()
    {
        Paginator::useBootstrap();
        return view("post.index", [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

    public function createView()
    {
        return View('post.create');
    }

    /**
     * Show the post by id.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function show($id)
    {
         return view('post.display', [
            'post' => Post::findOrFail($id)
        ]);
    }

    public function showComments($id)
    {
         return view('post.comments', [
            'comments' => Comment::where('post_id', '=', $id)->paginate(20)
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', [
            'post' => Post::findOrFail($id)
        ]);  
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'content'=>'required',
        ]); 

        if($validator->fails() || !Auth::user()){
            return redirect('/post')->with('warning', 'Post not created'); 
        }

        $post = new Post;

        $post->title =  $request->get('title');
        $post->content = $request->get('content');
        $post->author = Auth::id();
        $post->save();
 
        return redirect('/post')->with('success', 'Post created'); 
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'content'=>'required',
        ]); 

        if($validator->fails()){
            return redirect('/post')->with('warning', 'Post not updated'); 
        }

        $post = Post::find($id);

        $post->title =  $request->get('title');
        $post->content = $request->get('content');
        $post->save();
 
        return redirect('/post')->with('success', 'Post updated'); 
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post)
        {
            $post->delete(); 
        }
 
        return redirect('/post')->with('error', 'Post removed');  
    } 


}