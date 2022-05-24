<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function Symfony\Component\Console\Helper\render;
use function Symfony\Component\Finder\name;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render("Users/Index", [
            "title"   => "Пользователи",
            'filters' => \Request::only(['search']),
            "users"   => User::query()->when(\Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Users/Create', [
            "title" => 'Добавление пользователя'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest $request
     * @return RedirectResponse
     */
    public function store(UserFormRequest $request)
    {
        User::create($request->validate([
            "name"     => ["required", "string"],
            "email"    => ["required", "email", "string"],
            "password" => ["required", "string"]
        ]));

        session()->flash('create', 'Пользователь успешно добавлен');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            "title" => "Редактирование пользователя",
            "user"  => $user,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserFormRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserFormRequest $request, User $user)
    {
        $user->update(
            $request->validated()
        );

        session()->flash('message', 'Пользователь успешно обновлен!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
