<?php 

namespace App\Repositories\Brand;


interface BrandInterface {

	
	public function storeBrand($request);


    public function getAll();


    public function find($id);


    public function delete($id);

    
    public function update($id,$request);
}

?>