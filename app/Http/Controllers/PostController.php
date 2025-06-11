<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Container\Attributes\Storage;
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
            $path = $file->store('posts', 'public');
            $data['image'] = $path;
        }

        $this->post->create($data);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        if (!$post = $this->post->find($id))
            abort(404);

        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deletado com sucesso.');
    }

    public function edit($id)
    {
        if(!$post = $this -> post -> find($id))
            abort(404);

        return view('posts.edit', compact('post'));
    }

    public function update(storeUpdatePostRequest $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);

        
        
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if($request->image){
            $file = $request['image'];
            $path = $file->store('posts', 'public');
            $data['image']= $path;
        }

        $post->update($data);
        // Adicione outros campos conforme necessário
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso.');
    }
}
