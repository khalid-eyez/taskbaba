<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (auth()->check()) {
            return redirect()->route('tasks');
        }
        $useraccount = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($useraccount)) {
            $request->session()->regenerate();

            return redirect()->intended('tasks');
        }

        return back()->withErrors([
            'name' => 'Incorrect username or password.',
        ])->onlyInput('name');
    }

    public function loginform()
    {
        if (auth()->check()) {
            return redirect()->route('tasks');
        }

        return view('login');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Registration Successful ! Login now.');
        } catch (QueryException $qe) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'An error occurred while creating your account, please try again !',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Unknown error occurred while creating your account, please try again !',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
