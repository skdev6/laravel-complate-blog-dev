<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Caregory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaregoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categores = Caregory::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.category.index', compact('categores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'catname' => 'required|unique:caregories,name'
        ],[
            'required' => 'This is require field',
            'unique' => 'Please keep a unique name cz it\'s already taken'
        ]);

        Caregory::create([
            'name'=> $request->catname,
            'slug'=> Str::slug($request->catname, '-'),
            'description' => $request->catdes 
        ]);

        Session::flash('success', 'category created successfully'); 

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caregory  $caregory
     * @return \Illuminate\Http\Response
     */
    public function show(Caregory $caregory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caregory  $caregory
     * @return \Illuminate\Http\Response
     */
    public function edit(Caregory $caregory, $id)
    {
        $caregory = $caregory->where('id', '=', $id)->get()[0]; 
        return view('admin.category.edit', compact('caregory'));
        // return $singlecategory;
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caregory  $caregory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caregory $caregory, $id)
    {
        $this->validate($request, [
            'catname' => "required|unique:caregories,name, $caregory->name"
        ],[
            'required' => 'This is require field',
            'unique' => 'Please keep a unique name cz it\'s already taken'
        ]);

        $caregory->where('id', '=', $id)->update([
            'name'=> $request->catname,
            'description'=> $request->catdes,
            'slug'=> Str::slug($request->catname, '-'),
        ]);

        Session::flash('success', 'category Updated successfully'); 

        return redirect()->route('category.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caregory  $caregory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caregory $caregory, $id)
    {
        $catDelete = $caregory->where('id', '=', $id)->delete();
        if($catDelete){
            Session::flash("success", "Category Delete Successful");
            return redirect()->back();
        }
        
    }
}
