<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $posts = Post::with('user')->get();
        $user = User::find('id');

        return view('posts.index', compact('posts','user'));
    }
}
