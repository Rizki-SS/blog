<?php

namespace App\Http\Controllers;

use App\Category;
use App\Laman;
use App\Post;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index()
    {
        $post = Post::where('status', 'publish')->orderBy('created_at', 'desc')->paginate(2);
        $categories = Category::all();
        return view('main.post', compact('post', 'categories'));
        // return $data;
    }

    public function post($y, $m, $title)
    {
        $data = Post::where('url', $title)
            ->whereMonth('created_at', $m)
            ->whereYear('created_at', $y)
            ->first();

        if ($data->status != 'publish') {
            return redirect('/404');
        }

        return view('main.single_page', compact('data'));
    }

    public function laman($title)
    {
        $data = Laman::where('url', $title)
            ->first();

        if ($data != null) {
            if ($data->status == 'publish') {
                return view('main.laman', compact('data'));
            }
        }
        return redirect('/');
    }

    public function main()
    {
        $data = Post::where('status', 'publish')->orderBy('created_at', 'desc')->get()->take(4);
        return view('main.welcome', compact('data'));
    }

    public function categories($categori)
    {
        $post = Post::where('status', 'publish')->orderBy('created_at', 'desc')->paginate(2);
        $categories = Category::all();
        return view('main.post', compact('post', 'categories'));
    }
}
