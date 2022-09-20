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
                                <div class="page-title">Orders Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Show-Orders</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Orders</header>
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
                    							<th>Order Code</th>
                    							<th>Order name</th>
                    							<th>City</th>
                    							<th>Payment</th>
                    							<th>Status</th>
                    							<th>Order Date</th>
                                                <th> Action </th>
                                                <th> Change</th>
						                    </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                        @foreach ($order as $data)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$data->order_code}} </td>
                    					        <td>{{$data->order_name}}</td>
                    					        <td>{{$data->city}}</td>
                    					        <td>{{$data->payment}}</td>



                    					        <td>
                                                       @if($data->status == "Pending")
                                                       <span class="label label-info">Pending</span>
                                                       @elseif($data->status == "Inprocess")
                                                        <span class="label label-info">Inprocess</span>
                                                      
                                                       @elseif($data->status == "Shipped")
                                                         <span class="label label-warning">Shipped</span>
                                                        @elseif($data->status == "Delivered")
                                                        <span class="label label-success">Delivered</span>
                                                       @elseif($data->status == "Cancle")
                                                        <span class="label label-danger">Cancle</span>
                                                       @elseif($data->status == "Rejected")
                                                        <span class="label label-danger">Rejected</span>
                                                       @endif 
                                                    </td>





                    					        <td>  {{ \Carbon\Carbon::parse($data->created_at)->format('j F Y h:i:s A') }}</td>
                                                <td> <a class="btn btn-info btn-xs" href="{{ route('order-details',['order_code' =>$data->order_code ]) }}"  > View </a> </td>
                                                 <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Change Status
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="{{ route('change-order-status',['status' =>'Pending','order_code' => $data->order_code ]) }}">
                                                                    <i class="icon-flag"></i> Pending </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('change-order-status',['status' =>'Inprocess','order_code' => $data->order_code ]) }}">
                                                                    <i class="icon-flag"></i> In-Process </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('change-order-status',['status' =>'Shipped','order_code' => $data->order_code ]) }}">
                                                                    <i class="icon-flag"></i> Shipped </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="{{ route('change-order-status',['status' =>'Delivered','order_code' => $data->order_code ]) }}">
                                                                    <i class="icon-flag"></i> Delivered
                                                                    
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('change-order-status',['status' =>'Cancle','order_code' => $data->order_code ]) }}">
                                                                    <i class="icon-flag"></i> Cancle
                                                                    
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('change-order-status',['status' =>'Rejected','order_code' => $data->order_code ]) }}">
                                                                    <i class="icon-flag"></i> Rejected
                                                                    
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
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
<script src="{{url('Eadmin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/js/pages/table/table_data.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" ></script>
<script src="{{url('Eadmin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}" ></script>
@endpush