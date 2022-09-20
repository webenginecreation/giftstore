@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<style type="text/css">
    label{
        font-weight: bold;
    }
     label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    input.error { border-left: 4px solid #f00; }

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
                                <li class="active">Offers</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" id="adminOfferValidation" action="{{ (isset($data->id) ? route('update-offers',$data->id) : route('store-offers') ) }}" enctype="multipart/form-data" > @csrf     
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="card-head">
                                                        <header>@if(isset($data->id)) Update @else Add @endif   Offers</header>
                                         
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-primary" style="float: right;">@if(isset($data->id)) Update @else Submit @endif</button>
                                            </div>
                                        </div><br>
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                        <label for="simpleFormEmail">Offers Name</label>
                                                        <input type="text" class="form-control" value="{{ (isset($data->offers_name) ?  $data->offers_name : '' ) }}" id="offers_name" name="offers_name"  >
                                                        @if ($errors->has('offers_name'))
                                                        {{ $errors->first('offers_name') }}
                                                          @endif
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="simpleFormEmail">Start Date</label>
                                                        <input type="date" class="form-control"   value="{{ (isset($data->start_date) ? $data->start_date  : '' ) }}" id="start_date" name="start_date"  >
                                                        @if ($errors->has('start_date'))
                                                        {{ $errors->first('start_date') }}
                                                          @endif
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="simpleFormEmail">End Date</label>
                                                        <input type="date" id="end_date" class="form-control"  name="end_date"  value="{{ (isset($data->end_date) ? $data->end_date  : '' ) }}"  >
                                                        @if ($errors->has('end_date'))
                                                        {{ $errors->first('end_date') }}
                                                          @endif
                                                    </div>
                                                    
                                                        <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1"  >Active</option>
                                                    <option value="0" >Deactive</option>
                                                </select>
                                            </div>
                                     
                                                          
                                        
                                        
                                            </div>
                                            <div class="col-lg-8">
                                              
                                                 <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Offers List</header>
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
                                                
                                                <th>offers Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th> Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @php $i=0; @endphp
                                        @foreach ($allOffers as $value)
                                         <tr>
                                                <td>{{ ++$i }}</td>
                                                 
                                               
                                                 <td><a href="{{ route('getOffersProducts',$value->id) }}"> {{ ucfirst($value->offers_name) }} </a></td>
                                                  <td><b>{{ $value->start_date }}</b></td>
                                                   <td><b>{{ $value->end_date }}</b></td>
                                         
                                              
                                                <td>@if ($value->status == 0)
                                                 <a href="{{route('offers-status',["status" => 0,"id" => $value->id])}}">
                                                     <span class="label label-sm label-danger"> Inactive </span>   </a>
                                                    @else 
                                                    <a href="{{route('offers-status',["status" => 1,"id" => $value->id])}}">
                                                    <span class="label label-sm label-success">Active </span> </a>  @endif </td>
                                                  <td> 
                                                            <a href="{{route('edit-offers',$value->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                            <a href="{{route('delete-offers',$value->id)}}" onclick="confirmDelete()" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>
                                                           
                                                    </tr>
                                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                                        
                                        
                                           </div>

                                         </div> 
                                      
                                    </form>

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