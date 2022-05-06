<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function index()
    {
        Paginator::useBootstrap();
        return view("user.index", [
            'users' => User::orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

    public function show($id)
    {
         return view('user.display', [
            'user' => User::find($id)
        ]);
    }

}