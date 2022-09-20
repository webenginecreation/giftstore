<br>
<div class="row">
          <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>All blogs</header>
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
                                                <th>Blog Category</th>
                                                <th>Blog Title</th>
                                                <th>image</th>
                                                <th>Blog Details</th>
                                                <th>Video</th>
                                                <th>status</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                              @php $i=0; @endphp
                                            @foreach($blogs as $value)
                                            <tr>
                                             <td>{{ ++$i }}</td>
                                             <td>{{ $value->getAllBlogsWithCategory->blog_category_name }}</td>
                                             <td>{!! substr($value->blog_title,"0","200") !!}...
                                             </td>
                                             <td> <img src="/blogimg/{{$value->blog_images }}" height="50px;" width="50px;"> </td>
                                             <td>{{ str_limit(strip_tags($value->blog_details),20) }}</td>
                                              <td><iframe width="25%" height="100" src="{{$value->blog_video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> </iframe></td>
                                            <td>@if ($value->status == 0) 

                                                     <a href="">
                                                     <span class="label label-sm label-danger"> Inactive </span>  </a> 
                                                    @else 
                                                    <a href="">
                                                    <span class="label label-sm label-success">Active </span>   </a>  @endif</td>
                                            <td>
                                                <a href="{{ route('blog.edit',$value->id) }}" class="label label-sm label-success" > Edit </a>
                                                <a href="{{ route('delete-blog',$value->id) }}" class="label label-sm label-danger" > Delete</a>
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