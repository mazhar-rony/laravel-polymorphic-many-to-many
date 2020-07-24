<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Video;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* approach 1
        $request->validate([
            'name' => 'required',
            'description' => ''
        ]);

        Tag::create($request->except(['_token']));
        */


        $validated_data = $request->validate([
            'name' => 'required',
            'description' => ''
        ]);

        Tag::create($validated_data);


        return redirect()->to('/tags')->with('success','Tag added Succesfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //showing tag name instead of id in route
    public function show(Tag $tag) // when override getRouteKeyName() method in Tag Model
    {
        return view('tags.show',compact('tag'));
    }
    //normal approach ****

    /*public function show($tagname)// showing tag name instead of id in route
    {
        //$tag = Tag::where('name', $tagname)->first();//url display with name instead of index (no parameter nedded for = query)
        $tag = Tag::whereName($tagname)->first();// use it when use = query eg. where =

        return view('tags.show',compact('tag'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function videoTags($id)
    {
        $video = Video::find($id);

        $tags = $video->tags;

        $video->tags()->detach($tags);

        $video->update(request(['url','file_path']));

        $tags = Tag::find(request('tags'));

        $video->tags()->attach($tags);

        return redirect()->to('/videos')->with('success','Tags Updated Succesfully !!!');
    }

    public function postTags($id)
    {
        $post = Post::find($id);

        $tags = $post->tags;

        $post->tags()->detach($tags);

        $post->update(request(['title']));

        $tags = Tag::find(request('tags'));

        $post->tags()->attach($tags);

        return redirect()->to('/posts')->with('success','Tags Updated Succesfully !!!');
    }
}
