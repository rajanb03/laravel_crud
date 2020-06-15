<?php

namespace App\Exports;

use App\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
    return [
      "name","price","category","description"
    ];
  }


    public function collection()
    {
        // return Products::all();
        return collect(Products::getUsers());
    }
}
