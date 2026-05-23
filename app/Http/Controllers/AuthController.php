<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('profile')->with('success', 'Добро пожаловать, ' . $user->name . '!');
        }

        return back()->with('error', 'Неверный email или пароль');
    }


    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|min:4|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('profile')->with('success', 'Регистрация прошла успешно! Добро пожаловать!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Вы вышли из системы');
    }


    public function profile()
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Сначала войдите в систему');
        }

        $user = Auth::user();
        $orders = Order::with('service')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('auth.profile', compact('user', 'orders'));
    }
