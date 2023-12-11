<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubcategoryFormRequest;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Adscategory;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\SubcategoryUpadteRequest;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::get();
        return view('admin23.ads.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin23.ads.subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryFormRequest $request)
    {
        $request->validated();

        Subcategory::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'adscategory_id' => $request->adscategory_id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin23.ads.subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryUpadteRequest $request, $id)
    {
        Subcategory::find($id)->update([
            'name' => $request->name,
            'adscategory_id' => $request->adscategory_id
        ]);

        return redirect('admin23/subcategory')->with('message', 'Subcategory updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::find($id)->delete();
        return back()->with('message', 'Subcategory removed');
    }
    
}
