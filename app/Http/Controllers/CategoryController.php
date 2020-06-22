<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller 
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('create_cat');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'name' => 'required|unique:category|max:255',
            'description' => 'required',
        ]);

       $data = Category::create($request->all());
       
       return response()->json(['name' => $request->name, 'description' => $request->description]);
    }

    /**
     * Display the specified resource.
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $data = Category::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Integer $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate ([
            'name' => 'required|unique:category|max:255',
            'description' => 'required',
        ]);

        Category::where('id', $id)->update ([
            'name' => $request->name,
            'description' => $request->description
        ]);

         return response()->json(['name' => $request->name, 'description' => $request->description]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return response()->json(['id' => $id]);
    }
}
