<br>
<div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Brands</header>
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
                                                <th>Blog Title</th>
                                                <th>image</th>
                                                <th>status</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                              @php $i=0; @endphp
                                            @foreach($brands as $value)
                                            <tr>
                                             <td>{{ ++$i }}</td>
                                             
                                             <td>{{ $value->brand_name }}
                                             </td>
                                             <td> <img src="/brand_icon/{{$value->brand_icon }}" height="50px;" width="50px;"> </td>
                                            
                                            <td>@if ($value->brand_status == 0) 

                                                     <a href="">
                                                     <span class="label label-sm label-danger"> Inactive </span>  </a> 
                                                    @else 
                                                    <a href="">
                                                    <span class="label label-sm label-success">Active </span>   </a>  @endif</td>

                                                    <td> 
                                                      <a href="{{ route('brand.edit',$value->id) }}" class="label label-sm label-success" > Edit </a>
                                                        
                                                      <a href="{{ route('delete.brand',$value->id) }}" class="label label-sm label-danger" > Delete</a> </td>
                                           
                                        </tr>
                                        @endforeach
                                        </tbody>
                                  
                                  
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>