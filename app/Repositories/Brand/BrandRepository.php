<?php
namespace App\Repositories\Brand;


use App\Repositories\Brand\BrandInterface as BrandInterface;
use App\Admin\Brand;
use Illuminate\Support\Str;

class BrandRepository implements BrandInterface
{
    public $brand;


    function __construct(Brand $brand) {
    $this->brand = $brand;
    }

    public function storeBrand($request)
    {
           
           $requestData = $request;
           $requestData['brand_slug'] = Str::slug( $requestData['brand_name'],'-');
           $imageName = time().'.'.$requestData['brand_icon']->getClientOriginalName();
           $requestData['brand_icon']->move(public_path('brand_icon'), $imageName);
           $requestData['brand_icon'] = $imageName;
           return Brand::create($requestData);
           
     }

     public function update($id,$request)
    {   
           $brand = $this->brand->findBrand($id);
           $requestData = $request;
           $requestData['brand_slug'] = Str::slug( $requestData['brand_name'],'-');
           if(isset($requestData['brand_icon']))
           {

            $imageName = time().'.'.$requestData['brand_icon']->getClientOriginalName();
            $requestData['brand_icon']->move(public_path('brand_icon'), $imageName);
            $requestData['brand_icon'] = $imageName;
           }
           else
           {
            $requestData['brand_icon'] = $requestData['old_brand_icon'];
           }
           $brand->fill($requestData);
           return $brand->save($requestData);
      }

            public function getAll()
            {
                return $this->brand->getAll();
            }

             public function find($id)
             {
                return $this->brand->findBrand($id);
             }
             public function delete($id)
            {
                return $this->brand->deleteBrand($id);
            }
}

?>