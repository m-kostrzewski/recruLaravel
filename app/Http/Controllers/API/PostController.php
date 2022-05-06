<?php
 
namespace App\Http\Controllers\API;
 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller as Controller;
use Validator;

class PostController extends Controller {

    
    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'author'=>'required',
        ]); 

        if(!User::find($request->get('author')))
        {
            return response('User not exist. Cant create post');
        }
        else
        {
            $post = new Post;
            $post->title =  $request->get('title');
            $post->content = $request->get('content');
            $post->author = $request->get('author');
            $post->save();
    
            return response('Post created');
        }

    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'content'=>'required'
        ]); 

        if($validator->fails()){
            return response("Post not updated");
        }
        
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return response('Post updated');   
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($post)
        {
            $post->delete(); 
            return response('Post destroyed');
        }
        else{
            return response("Post doesn't exist");
        }
 
        

    } 


}