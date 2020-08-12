<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\Http\Requests\StorePost;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::enableQueryLog();
        // $posts = BlogPost::with('comments')->get();

        // foreach ($posts as $post) {
        //     foreach ($post->comments as $comment) {
        //         echo $comment->content;
        //     }
        // }
        // dd(DB::getQueryLog());

        return view('posts.index', ['posts' => BlogPost::withCount('comments')->get()]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //validate and svae to DB table
        $validatedData = $request->validated();
        $blogPost = BlogPost::create($validatedData);
        $request->session()->flash('status', 'Post was creatED Successfully');
        return redirect()->route('posts.show', ['post' => $blogPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', ['post' => BlogPost::with('comments')->findOrFail($id)]);
        // dd(BlogPost::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        // pierwszy sposob na authoryzacje action
        // if (Gate::denies('update-post', $post)) {
        //     abort(403, "You are not allowed to Update that BlogPost");
        // }
        //drugi sposob na authoryzacje action
        Gate::authorize('update-post', $post);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        //pierwszy sposob na autoryzcja wykonania action
        if (Gate::denies('update-post', $post)) {
            abort(403, "You are not allowed to Update that BlogPost");
        }

        $validateData = $request->validated();
        $post->fill($validateData);
        $post->save();
        $request->session()->flash('status', 'Post UPDATED successfully');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        // pierwszy sposob na autoryzcja action
        // if (Gate::denies('delete-post', $post)) {
        //     abort(403, "You are not authorized to delete this post");
        // }
        //drugi sposob na autoryzacje action
        Gate::authorize('update-post', $post);
        $post->delete();
        $request->session()->flash('status', 'Post was DELETED');
        return redirect()->route('posts.index');
    }
}
