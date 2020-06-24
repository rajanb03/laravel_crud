<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['name','description',]; 
     
    public static function getRecords()
    {
     	$records = DB::table('categories')->select('name','description')->orderBy('id', 'asc')->get()->toArray();

     	return $records;
   }
}
