<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
        ]);

        if ($validator->fails()) {

            return redirect('post')
                ->withErrors($validator)
                ->withInput();
        }

        Post::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title)
        ]);

        return redirect()->back();

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments;

        return view('post.single', compact('post', 'comments'));

    }

    public function comment(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $post->comments()->create(['comment' => $request->comment, 'user_id' => $request->user()->id]);

        return back();

    }
}
