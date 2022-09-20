<?php
namespace App\Repositories\Inventory;

use App\Repositories\Inventory\InventoryInterface as InventoryInterface;
use App\Admin\Inventory;


class InventoryRepository implements InventoryInterface
{
    public $inventory;
    function __construct(Inventory $inventory) {
    $this->inventory = $inventory;
    }
    public function getAll()
    {
    	//return Inventory::select('Inventory.*')->join('Product', 'Inventory.product_id', '=', 'Product.id');
     return $this->inventory->getAll();
    }

     public function storeInventory($request)
     {
        return Inventory::updateOrCreate(['product_id'=>$request['product_id']],$request);
     }

      public function delete($id)
      {
        return $this->inventory->deleteInventory($id);
      }

}

?>