<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $data = Category::all();

        // return view('show_cat')->with('data',$data);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        return view('create_cat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request) {
        $validatedData = $request->validate ([
            'name' => 'required|unique:category|max:255',
            'description' => 'required',
        ]);

       $data = Category::create($request->all());
       
       return response()->json(['name' => $request->name, 'description' => $request->description]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show($id) {
        $data = Category::find($id);

        // return view('read_cat')->with('data',$data);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {
        $data = Category::find($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $validatedData = $request->validate ([
            'name' => 'required|unique:category|max:255',
            'description' => 'required',
        ]);

        Category::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

         return response()->json(['name' => $request->name, 'description' => $request->description]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {
        Category::where('id', $id)->delete();
        
        return response()->json(['id' => $id]);
    }
}
