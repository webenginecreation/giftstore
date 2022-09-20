<?php

namespace App\Repositories\Inventory;


interface InventoryInterface {


	 public function storeInventory($request);
     public function getAll();
    //public function find($id);
     public function delete($id);
    //public function update($id,$request);
}
