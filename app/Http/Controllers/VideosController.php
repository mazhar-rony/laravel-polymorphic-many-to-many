<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('videos.index', [
            'videos' => Video::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create', [
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

        $video = Video::create(request()->except('_token','tags'));

        $tags = Tag::find($tags);
        //dd($tags);
        $video->tags()->attach($tags);

        //return back();
        return redirect()->to('/videos')->with('success','Video added Succesfully !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('videos.show',[
            'video' => Video::find($id),
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
        return view('videos.edit', [
            'video' => Video::find($id),
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
    /*public function update(Request $request, $id)
    {
        $video = Video::find($id);

        $tags = $video->tags;

        $video->tags()->detach($tags);

        $video->update(request(['url', 'file_path']));

        $tags = Tag::find(request('tags'));

        $video->tags()->attach($tags);

        return redirect()->to('/videos')->with('success','Video Updated Succesfully !!!');
    }*/

    // Another Approach
    public function update(Request $request, $id)
    {
        // Form Value
        $tags = $request->tags;

        //current original data from database
        $video = Video::find($id);

        $video->update(request()->except('_token', 'tags'));

        // Find tag in database to confirm tag
        $tags_from_database = Tag::find($tags);

        //$video->tags()->detach($video->tags);

        //$video->tags()->attach($tags_from_database);

        // Above 2 lines can be done by the following line
        $video->tags()->sync($tags_from_database);

        return redirect()->to('/videos')->with('success','Video Updated Succesfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        $tags = $video->tags;

        $video->tags()->detach($tags);

        $video->delete($video);

        return redirect()->to('/videos')->with('success','Video Deleted Succesfully !!!');
    }
}
