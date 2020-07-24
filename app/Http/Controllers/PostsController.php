<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = $request->tags;
        //dd($tags);

        $post = Post::create(request()->except('_token','tags'));

        $tags = Tag::find($tags);
        //dd($tags);
        $post->tags()->attach($tags);

        //return back();
        return redirect()->to('/posts')->with('success','Post added Succesfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show',[
            'post' => Post::find($id),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', [
            'post' => Post::find($id),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Normal Approach
    /* public function update(Request $request,$id)
    {
        $post = Post::find($id);

        $tags = $post->tags;

        $post->tags()->detach($tags);

        $post->update(request(['title', 'body']));

        $tags = Tag::find(request('tags'));

        $post->tags()->attach($tags);

        return redirect()->to('/posts')->with('success','Post Updated Succesfully !!!');
    }*/

    // Another Approach
    public function update(Request $request,$id)
    {
        // Form Value
        $tags = $request->tags;

        //current original data from database
        $post = Post::find($id);

        $post->update(request()->except('_token', 'tags'));

        // Find tag in database to confirm tag
        $tags_from_database = Tag::find($tags);

        //$post->tags()->detach($post->tags);

        //$post->tags()->attach($tags_from_database);

        // Above 2 lines can be done by the following line
        $post->tags()->sync($tags_from_database);

        return redirect()->to('/posts')->with('success','Post Updated Succesfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $tags = $post->tags;

        $post->tags()->detach($tags);

        $post->delete($post);

        return redirect()->to('/posts')->with('success','Post Deleted Succesfully !!!');
    }
}
