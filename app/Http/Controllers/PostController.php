<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render("Posts/Index", [
            "title"   => "Статьи",
            'filters' => \Request::only(['search']),
            "posts"   => Post::query()->when(\Request::input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })->paginate(5)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render("Posts/Create", [
            "title" => "Cоздание записи"


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostFormRequest $request
     * @return RedirectResponse
     */
    public function store(PostFormRequest $request)
    {
        Post::create($request->validated());

        session()->flash('create', 'Запись успешно создана');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Inertia\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            "title" => "Редактировать",
            "post"  => $post,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostFormRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $post->update(
            $request->validated()
        );

        session()->flash('message', 'Запись успешно обновлена');

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('delete', 'Запись удалена');
        return redirect()->back();
    }
}
