<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    protected $table = "products";

    protected $fillable = ['name','description','category_id','price','category',]; 

     
    public static function getUsers()
    {
     	$records = DB::table('products')->select('name','price','category','description')->orderBy('id', 'asc')->get()->toArray();

     	return $records;
   }
}
