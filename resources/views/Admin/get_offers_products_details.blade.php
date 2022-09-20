@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
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
                                <li class="active">get-offers-products</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                    
                    <div class="row">
                    <div class="col-md-12">
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
                                                <th>Sr.no</th>
                                                <th>Action</th>
                                                <th>Offers Name</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Display Price</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                        @foreach ($getOffersById as $value)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <th><a href="{{route('remove-offer-product',$value->id)}}" class="btn btn-danger">Remove</a></th>
                                                  <td> <img src="{{env('APP_URL')}}/images/{{ $value->hasOneProduct->images }}" height="60px" width="60px"> </td>
                                                 <td>{{ ucfirst($value->hasOneOffers->offers_name) }}</td>
                                                 <td>{{ ucfirst($value->hasOneProduct->name) }}</td>
                                                 <td><b>{{ ucfirst($value->hasOneProduct->discount_price) }}</b></td>
                                                               
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  
                </div>
            </div>
@endsection

@push('scripts')
<script>
function confirmDelete() {
  var txt;
  var r = confirm("Want to Delete ?");
 
}
</script>

<script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
@endpush