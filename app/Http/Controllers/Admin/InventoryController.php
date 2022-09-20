<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Inventory\InventoryInterface as InventoryInterface;
use App\Admin\Product;
use App\Admin\Inventory;

class InventoryController extends Controller
{
    //
     public function __construct(InventoryInterface $inventory)
    {
    	parent::__construct();//This is Main controller Instant For Site Config Data
    	$this->inventory = $inventory;
    }
    public function index()
    {
    	$inventory = $this->inventory->getAll();
        $allProducts = Product::select('id','name')->get();
        return view('Admin.Inventory.index',compact('inventory','allProducts'));
    }

    public function store(Request $request)
    {
             $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
          ]);
        $inventory = $this->inventory->storeInventory($request->all()); 
        return redirect()->back()->with('success','Stock Added Successfully');
     }

     public function delete($id)
    {
        $inventory = $this->inventory->delete($id);
        return redirect()->back()->with('success','Inventory deleted Successfully');
    }
}
