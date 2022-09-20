@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    label{
        font-weight: bold;
    }
</style>
@endpush
@section('main-section')
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Promotion Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Offer-Products</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" action="{{ route('store.offers.products') }}" > @csrf     
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-head">
                                                        <header> Add Products In Offers</header>
                                         
                                                </div>
                                            </div>
                                          
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-10">
                                               <div class="form-group">
                                                <label>Select Offers</label>
                                                <select class="form-control" required name="offers_id">
                                                
                                                @foreach ($allOffers as $value)
                                                    <option  value="{{ $value->id }}">{{ ucfirst($value->offers_name) }}</option>
                                                @endforeach
                                                </select>
                                                 @if ($errors->has('offers_id'))
                                                        {{ $errors->first('offers_id') }}
                                                          @endif  
                                            </div>
                                                
                                              <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Products List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sr.no</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Display Price</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                           @php $i=0; @endphp
                                        @foreach ($allproducts as $value)
                                            <tr>
                                                <td> <input type="checkbox" name="product_id[]" value="{{ $value->id }}"> </td>
                                                <td>{{ ++$i }}</td>
                                                  <td> <img src="{{env('APP_URL')}}/images/{{ $value->images }}" height="60px" width="60px"> </td>
                                                
                                                 <td>{{ ucfirst($value->name) }}</td>
                                                <td><b>{{ ucfirst($value->discount_price) }}</b></td>
                                               </tr>
                                            @endforeach 
                                            
                                          
                                       
                                        </tbody>
                                        
                                          <tr> 
                                          <th>
                                            <button type="submit" class="btn btn-primary"> Add Selected  </button>
                                            </th>
                                            </tr>
                                       
                                        </form>
                                    </table>
                                    </div>
                                </div>
                            </div>   
                            
                            
                                                          
                                        
                                        
                                            </div>
                                            <div class="col-lg-2">
                                              
                                          
                                        
                                           </div>

                                         </div> 
                                      
                                    

                                </div>

                                     
                            </div>

                      </div>
                    
                 

                    </div>
                    
                    
              
                    
                  
                </div>
            </div>


@endsection

@push('scripts')
<script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
@endpush