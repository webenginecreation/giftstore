@extends('Admin.master')
@push('css')
<link href="{{url('Eadmin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('main-section')
<div class="page-content-wrapper">
                <div class="page-content">
                @include('flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Add Sub Category</header>
                                     
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" action="{{url('admin/subcategory')}}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
	                                            <label>Select Main Category</label>
	                                            <select class="form-control" name="category_id">
                                                <option><-- Select Category --></option>
                                                @foreach ($Categories as $Category)
	                                                <option value="{{$Category->id }}">{{ ucfirst($Category->category_name) }}</option>
                                                @endforeach
	                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="simpleFormEmail">Sub Category Image</label>
                                            <input type="file" class="form-control" name="sub_category_image"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Category Name</label>
                                            <input type="text" class="form-control" name="sub_category_name"  placeholder="Enter Sub Category Name">
                                        </div>
                                      <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Sub Categories</header>
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
                                                <th>Image</th>
                                                <th>Main category</th>
                                                <th>Sub category</th>
                                                <th>added name</th>
                                                <th>status</th>
                                                <th>created_at</th>
                                                <th>updated_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                        @foreach ($SubCategories as $subcategory)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td> <img src="/images/{{ $subcategory->sub_category_image }}" style="width:20%"> </td>
                                                <td>{{ ucfirst($subcategory->category->category_name) }}</td>
                                                <td>{{ ucfirst($subcategory->sub_category_name) }}</td>
                                                <td>{{ $subcategory->user_id }}</td>
                                                <td>@if ($subcategory->status == 0) 
                                                     <span class="label label-sm label-danger"> Inactive </span>   
                                                    @else 
                                                    <span class="label label-sm label-success">Active </span>  @endif </td>
                                                <td>{{ $subcategory->created_at }}</td>
                                                <td>{{ $subcategory->updated_at }}</td>
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