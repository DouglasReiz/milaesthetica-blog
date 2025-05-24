<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $user;
    protected $post;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;

        $this->post = $post;
    }

    public function index()
    {
        $posts = Post::with('user')->get();
        $user = User::find('id');

        return view('posts.index', compact('posts', 'user'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(storeUpdatePostRequest $request)
    {

        $data = $request->all();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('recipes', 'public');
            $data['image'] = $path;
        }

        $this->post->create($data);

        return redirect()->route('posts.index');
    }
}
