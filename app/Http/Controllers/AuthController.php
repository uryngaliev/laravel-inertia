<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Validation\Rules\Password;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function ShowRegisterForm()
    {
        return Inertia::render("Auth/Register", [
            "title" => 'Регистрация'
        ]);
    }

    public function ShowLoginForm()
    {
        return Inertia::render("Auth/Login", [
            "title" => 'Вход'
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name"     => ["required", "string"],
            "email"    => ["required", "email", "string", "unique:users"],
            "password" => ["required", "string", "min:2"]
        ]);


        $user = User::create([
            "name"     => $data["name"],
            "email"    => $data["email"],
            "password" => bcrypt($data["password"])
        ]);


        if ($user) {
            auth()->login($user);
        }
        return redirect(route("home"));
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email"    => ["required", "email", "string"],
            "password" => ["required",]
        ]);
        if (auth("web")->attempt($data)) {
            return redirect(route("posts.index"));
        }
        return redirect(route("login"))->withErrors([
            "email" => "Пользователь не найден, или данные введенны не правильно"
        ]);

    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}


