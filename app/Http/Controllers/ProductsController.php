<?php

namespace App\Http\Controllers;

use App\Products;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

class ProductsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $data = DB::table('products')->paginate(2);

        // return view('show')->with('data',$data);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        $data = Category::select('name')->get();

        // return view('create')->with('data',$data);
        return response()->json($data);
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
                'price' => 'required|digits:10',
                'category' => 'required',
        ]);

        $category_id = Category::select('id')->where('name', $request->category)->first();

        Products::insert ([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'category_id' => $category_id->id
        ]);

        return response()->json ([
             'name' => $request->name, 
             'price' => $request->price,
             'description' => $request->description,
             'category' => $request->category,
             'category_id' => $category_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */

    public function show($id) {
        $data = Products::find($id);

        // return view('read_pro')->with('data',$data);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {
        $data = Products::find($id);
        // return view('edit')->with('data',$data);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $validatedData = $request->validate ([
                'name' => 'required|unique:category|max:255',
                'description' => 'required',
                'price' => 'required|digits:10',
                'category' => 'required',
        ]);

        $category_id = Category::select('id')->where('name',$request->category)->first();

        Products::where('id',$id)->update ([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'category_id' => $category_id->id,
            'description' => $request->description
        ]);

        return response()->json ([
             'name' => $request->name, 
             'price' => $request->price,
             'description' => $request->description,
             'category' => $request->category,
             'category_id' => $category_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {
        Products::where('id', $id)->delete();
 
        return response()->json(['id' => $id]);
    }

    public function search(Request $request) {
        $name = $request->search;
        $data = Products::where('name', 'like', '%'.$name.'%')->paginate(2);
        return response()->json($data);
    }

    public function export(Request $request) {   
            return Excel::download(new ProductExport, 'products.xlsx');
    }


    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('my_token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            // return redirect('/api/products');
            return response($response,201);
        } 
        else { 
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } 
    }

}
