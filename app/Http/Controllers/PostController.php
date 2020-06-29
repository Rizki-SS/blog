<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Post::all();
        return view('post.index', compact('data'));
    }

    public function create()
    {
        $category = Category::pluck('name', 'id')->all();
        return view('post.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:Post,title',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $text = $request->image->extension();
            $imageName = date('d-M-Y') . "_" . $input['title'] . "." . $text;
            $request->image->move(public_path('/storage/files/shares/post/'), $imageName);
            $input['image'] = $imageName;
        } else {
            $input['image'] = 'default.jpg';
        };

        $input['url'] = str_replace(' ', '-', $input['title']);

        // return $input;

        $Post = Post::create($input);

        return redirect()->route('posts.index')->with('success', 'Post created');
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $category = Category::pluck('name', 'id')->all();
        return view('post.edit', compact('data', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $text = $request->image->extension();
            $imageName = date('d-M-Y') . "_" . $input['title'] . "." . $text;
            $request->image->move(public_path('/storage/files/shares/post/'), $imageName);
            $input['image'] = $imageName;
        }

        $input['url'] = str_replace(' ', '-', $input['title']);

        $post = Post::find($id);
        $post->update($input);

        return redirect()->route('posts.index')->with('success', 'Post created');
    }

    public function show($id)
    {
        // return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->route('posts.index')->with('success', 'Post Deleted');
    }
}
