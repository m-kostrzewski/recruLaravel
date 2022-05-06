<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{

    public function loginView()
    {
        return view("auth.login");
    }
    public function registerView()
    {
        return view("auth.register");
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $input = $request->validate([
            'email' => ['required', 'email'],
            'username' => ['required'],
            'password' => ['required'],
            'password2' => ['required'],
        ]);
 
        if (User::where('email', '=', $input['email'])->first() === null && $input['password'] === $input['password2']) {
            $user = new User;
            $user->name = $input['username'];
            $user->email = $input['email'];
            $user->password = Hash::make($input['password']);
            $user->save();
            Auth::attempt(['email' => $input['email'], 'password' => $input['password']]);
            return redirect()->intended('/');
        }

        if ($input['password'] !== $input['password2']) {
            return back()->withErrors([
                'password' => 'Passwords not match',
            ]);
        }
        else{
            return back()->withErrors([
                'email' => 'Email is in use'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}