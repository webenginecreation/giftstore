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
                                <div class="page-title">Blog Categories Management</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin-dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Blog Categories</li>
                            </ol>
                        </div>
                    </div>
                @include('flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                   
                                    <header>{{ (isset($editData->id) ? 'Edit Category' : 'Add Category' )  }}</header>
                                     
                                </div>
                                <div class="card-body " id="bar-parent">
                                   
                                    <form method="POST" action="{{(isset($editData->id) ? route('blog-category.update',$editData->id) : route('blog-category.store'))}}">
                                    @csrf
                                    @if(isset($editData->id)) @method('PUT') @endif
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Blog Category Name</label>
                                            <input type="text" class="form-control" name="blog_category_name" 
                                            value="{{old('category_name',(isset($editData->blog_category_name) ? $editData->blog_category_name : '' )) }}"  placeholder="Enter Category Name">
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
                                    <header>All Blogs Categories</header>
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
                                                <th>Blog category name</th>
                                                <th colspan="2">Action<th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                        @foreach ($BlogCategories as $Category)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ ucfirst($Category->blog_category_name) }}</td>
                                             
                                                     <td>

                                            <a href="{{ route('delete-blog-category',$Category->id) }}" class="" data-toggle="tooltip" title="Delete">  <i class="fa fa-trash"></i>  </a>

                                                       </td>
                                                      <td><a href="{{ route('blog-category.edit',$Category->id) }}" class="" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-check"></i></a>  </a> </td>
                                                
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