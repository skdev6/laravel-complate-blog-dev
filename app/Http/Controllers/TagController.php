<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at')->paginate(20);
        return view('admin.tag.index', compact('tags'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'tagname' => 'required|unique:tags,name'
       ]); 
       Tag::create([
        'name' => $request->tagname,
        'description' => $request->tagdes,
        'slug' => Str::slug($request->tagname, '-'),
       ]);
       Session::flash('success', "Tag created successfully"); 
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'tagname' => "required|unique:tags,name, $tag->name"
        ]); 
        $tag->name = $request->tagname;
        $tag->slug = Str::slug($request->tagname, '-');
        $tag->description = $request->tagdes;
        $tag->save();
        Session::flash('success', 'Tag Updated Successfully');
        return redirect()->route('tag.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag){
            $tag->delete();
            Session::flash('success', 'Tag Delete Successfully');
            return redirect()->route('tag.index'); 
        }
    }
}
