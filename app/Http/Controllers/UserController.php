<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function login(Request $request){
        $loginFields = $request->validate([
            'login_email' => 'required',
            'login_password' => 'required'
        ]);

        if (auth()->attempt([
            'email' => $loginFields['login_email'],
            'password' => $loginFields['login_password']
        ])) {
            $request->session()->regenerate();
            return redirect('/note');
        }

        return back()->withErrors([
            'login_email' => 'Invalid email or password.',
        ])->onlyInput('login_email');
    }

    public function register(Request $request){
       $registerFields = $request->validate([
        'name' => 'required',
        'email' => ['required', 'unique:users,email'],
        'password' => ['required', 'min:8'],
       ]);

       $registerFields['password'] = bcrypt($registerFields['password']);
       $user = User::create($registerFields);
       auth()->login($user);
       return redirect('/');
    }

    public function showWelcome() {
        return view('welcome');
    }

    public function showLogin() {
        return view('login');
    }

    public function showRegister() {
        return view('register');
    }

    public function showNote() {
        $notes = Note::where('user_id', auth()->id())->get();
        return view('note', compact('notes'));
    }

}
