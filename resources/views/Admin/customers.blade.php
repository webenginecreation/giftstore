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
                                <div class="page-title">Customer Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Customers</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                   
                   <div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Customers</header>
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
                                                <th>Name</th>
                                                <th>Lastname</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>User Type</th>
                                                
                                                </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                        @foreach ($getAllCustomers as $value)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                              
                                                
                                                 <td>{{ ucfirst($value->name) }}</td>
                                                 <td>{{ ucfirst($value->last_name) }}</td>
                                                 <td>{{ ucfirst($value->email) }}</td>
                                                 <td>{{ ucfirst($value->mobile) }}</td>
                                                <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-success dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> {{ strtoupper($value->user_type) }}
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                             <li>
                                                                <a href="{{ route('change-user-type',['id'=>$value->id,'user_type'=>'normal']) }}">
                                                                    <i class="icon-user"></i> Normal </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('change-user-type',['id'=>$value->id,'user_type'=>'reseller']) }}">
                                                                    <i class="icon-user"></i> Reseller </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('change-user-type',['id'=>$value->id,'user_type'=>'wholeseller']) }}">
                                                                    <i class="icon-user"></i> Wholeseller </a>
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