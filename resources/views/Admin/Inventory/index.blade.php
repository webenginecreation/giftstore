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
                                <div class="page-title">Inventory Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Manage</li>
                            </ol>
                        </div>
                    </div>
        @include('flash-message')
        

<div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Inventory Report</header>
                                    <div class="tools">
                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add New Or Update</button>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Item Name</th>
                                                <th>Available Qty</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                              @php $i=0; @endphp
                                            @foreach($inventory as $value)
                                            <tr>
                                             <td>{{ ++$i }}</td>
                                             <td>{{ $value->name }}</td>
                                             <td><b>{{ $value->quantity }}</b></td>
                                             <td> <a href="{{ route('delete.inventory',$value->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <form method="POST" action="{{ route('store.inventory') }}">
              @csrf
             <div class="form-group">
               <lable>Products</lable>
                <select class="form-control" name="product_id" required="">
                  <option value=""><-- Select Products --></option>
                  @foreach($allProducts as $key => $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
                  </select>
            </div>
            &nbsp;
             <div class="form-group">
               <lable>Add Quantity</lable>
                  <input type="number" required="" class="form-control" name="quantity" placeholder="Enter Numeric value" >
            </div>

            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Stock</button>

  </form>      </div>
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