<?php

namespace App\Exports;

use App\Admin\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('category_id',
        'name',
        'base_price',
        'discount_price',
        'CGST',
        'SGST',
        'size',
        'details',
        'Short_details',
        'product_link',
        'status',
        'stock_status',
        'stock_amount',
        'weight',
        'length',
        'width',
        'height',
        'affiliate_carrier')->get();
    }

    public function headings(): array
    {
        return [
       
        'category_id',
        'name',
        'base_price',
        'discount_price',
        'CGST',
        'SGST',
        'size',
        'details',
        'Short_details',
        'product_link',
        'status',
        'stock_status',
        'stock_amount',
        'weight',
        'length',
        'width',
        'height',
        'affiliate_carrier'

       ];
    }
}
