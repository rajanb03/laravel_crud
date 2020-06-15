<?php

namespace App\Http\Controllers;

use App\Products;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')->paginate(2);

        return view('show')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::select('name')->get();

        return view('create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id = Category::select('id')->where('name',$request->category)->first();

        Products::insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'category_id' => $category_id->id
        ]);

        return "Success.";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products,$id)
    {
        $data = Products::find($id);

        return view('read_pro')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Products::find($id);

        return view('edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category_id = Category::select('id')->where('name',$request->category)->first();

        Products::where('id',$id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'category_id' => $category_id->id,
            'description' => $request->description
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::where('id',$id)->delete();

        return back();
    }

    public function search(Request $request)
    {
        $name = $request->search;
        $data = Products::where('name','like','%'.$name.'%')->paginate(2);
        return view('show')->with('data',$data);
    }

    public function export(Request $request)
    {   
        if ($request->input('exportexcel') != null )
        {
            return Excel::download(new ProductExport, 'products.xlsx');
        }

        return redirect()->action('PagesController@index');
    }
}
