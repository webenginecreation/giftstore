<br>
<div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All Products</header>
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
                                                <th>Category</th>
                                                <th>image</th>
                                                <th>name</th>
                                                <th>Price</th>
                                                <th>Reseller Price</th>
                                                <th>Wholeseller Price</th>
                                                <th>Size</th>
                                                <th>status</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @php $i=0; @endphp
                                            @foreach($allproducts as $value)

                                             <td>{{ ++$i }}</td>
                                             <td>{{ $value->category->category_name }}</td>
                                             <td> <img src="/images/{{$value->images }}" height="50px;" width="50px;"> </td>
                                             <td>{{ $value->name }}</td>
                                              <td>₹&nbsp;{{ $value->discount_price }}</td>
                                              <td>₹&nbsp;{{ $value->reseller_price }}</td>
                                              <td>₹&nbsp;{{ $value->wholeseller_price }}</td>
                                            <td>{{ $value->size }}</td>
                                            <td>@if ($value->status == 0) 

                                                     <a href="">
                                                     <span class="label label-sm label-danger"> Inactive </span>  </a> 
                                                    @else 
                                                    <a href="">
                                                    <span class="label label-sm label-success">Active </span>   </a>  @endif</td>
                                            <td>
                                                <a href="{{ route('edit-products',$value->id) }}" class="label label-sm label-success" > Edit </a>
                                                <a href="{{ route('delete-products',$value->id) }}" class="label label-sm label-danger" > Delete</a>
                                            </td>
                                        </tbody>
                                  @endforeach
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>