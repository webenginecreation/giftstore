<?php

namespace App\Imports;

use App\Admin\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class ProductsImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
     public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        //dd($row);
        return new Product([

            'category_id'=> $row[0],
            'name'=> $row[1],
            'slug'=> $row[2],
            'images'=> $row[3], 
            'discount_price'=> $row[4],
            'details'=> $row[5],
            'base_price'=> $row[6],
            'Short_details'=> $row[7],
            'status'=> $row[8]
         ]);
    }
}
