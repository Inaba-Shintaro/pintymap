<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(6);
        $search = $request->input('search');

        if ($search) {
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            //postのタイトルと説明文で検索
            $postQuery = Post::query();
            foreach ($wordArraySearched as $value) {
                $postQuery->where('title', 'like', '%' . $value . '%')
                ->orWhere('description', 'like', '%' . $value . '%');
            }
            $posts = $postQuery->latest()->paginate(6);

            //userの名前で検索
            $userQuery = User::query();
            foreach ($wordArraySearched as $value) {
                $userQuery->where('name', 'like', '%' . $value . '%');
            }
            $users = $userQuery->latest()->paginate(6);

            return view('posts.index')
            ->with([
                'posts' => $posts,
                'users' => $users,
                'search' => $search,
            ]);
        }

        return view('posts.index')
            ->with([
                'posts' => $posts,
                'search' => $search,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->user_id = Auth::id();
        $post->fill($request->except('image'));

        if ($request->image) {
            $uploaded_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $post->image = $uploaded_url;
        }

        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->fill($request->except('image'));

        if ($request->image) {
            $uploaded_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $post->image = $uploaded_url;
        }

        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
