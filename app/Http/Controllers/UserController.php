<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Siz kiritgan ma\'lumotlar mos emas',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }

    public function admin(Request $request)
    {
        $user = $request->user();

        return 'Xush kelibsiz, ' . $user->name;
    }

    public function books(Request $request)
    {
        $books = Book::query()
            ->paginate(3);

        return view('books', [
            'books' => $books
        ]);
    }
}

