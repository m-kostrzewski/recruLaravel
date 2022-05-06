<?php
 
namespace App\Http\Controllers\API;
 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Http\Controllers\Controller as Controller;
use Validator;

class CommentController extends Controller {

    
    public function show($id)
    {
        $comment = Comment::find($id);
        if (is_null($comment)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json($comment);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id'=>'required',
            'content'=>'required',
            'author'=>'required',
        ]); 

        if(!User::find($request->get('author')))
        {
            return response('User not exist. Cant create post');
        }
        else if(!Post::find($request->get('post_id')))
        {
            return response('Post not exist. Cant create post');
        }
        else
        {
            $comment = new Comment;
            $comment->post_id =  $request->get('post_id');
            $comment->content = $request->get('content');
            $comment->author = $request->get('author');
            $comment->save();
    
            return response('Comment created');
        }
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $validator = Validator::make($request->all(), [
            'content'=>'required'
        ]); 

        if($validator->fails()){
            return response("Comment not updated");
        }
        
        $comment->content = $request->get('content');
        $comment->save();

        return response('Comment updated');   
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if($comment)
        {
            $comment->delete(); 
            return response('Comment destroyed');
        }
        else{
            return response("Comment doesn't exist");
        }
 
        

    } 


}