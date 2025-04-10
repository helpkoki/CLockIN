<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\CheckIn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function login(Request $request)
    {
        // Handle login logic here
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($input)) {
            // Authentication passed, generate session
            return redirect()->route('check-ins.index');
        }

        return redirect()->back()->with('error', 'Invalid username or password');

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function Register(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:5'
        ]);

        // Create the user with hashed password
        $user = User::create([
            'email' => $validated['email'],
            'name' => $validated['username'],
            'password' => bcrypt($validated['password'])
        ]);

        // Return a success response (you can customize this further)
        return redirect()->route('login');

    }
 

}
