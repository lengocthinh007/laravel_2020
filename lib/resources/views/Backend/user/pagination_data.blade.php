  @if(isset($user) && $user != '')
                    
                    @foreach($user as $item)
                <tr>
                  <td>{!! $item->id !!}</td>
                  <td>{!! $item->name !!}</td>
                  <td>{!! $item->email !!}</td>
                  <td>{!! $item->phone !!}</td> 
                  <td>{!! $item->avatar !!}</td>
                  <td>
                              <a href="{{asset('admin/category/edit/'.$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                              <a href="{{asset('admin/category/delete/'.$item->id)}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                            </td>
                          </tr>
                       @endforeach
                <tr style="border: none">
                   <td colspan="6" style="text-align: center;">
                                   <?php
          $pagination = paginate($user->currentPage(),$user->lastPage());
        ?>
            <div class="shop_page_nav d-flex flex-row">
              <ul class="pagination">
              @if($pagination[0] != $user->currentPage())
              <li class="page-item">
                    <a class="page-link" href="{!! $user->appends($query)->url($user->currentPage()-1) !!}" rel="prev" aria-label="« Previous">‹</a>
              </li>
              @endif
              @foreach($pagination as $i)
              <li class="page-item {!! ($i==$user->currentPage())?'active':'' !!}">
                             <a href="{!! $user->appends($query)->url($i) !!}" class="page-link">{{$i}}</a>
                        </li>
                        @endforeach
              @if($pagination[count($pagination) - 1] != $user->currentPage())
               <li class="page-item">
                    <a class="page-link" href="{!! $user->appends($query)->url($user->currentPage()+1) !!}" rel="next" aria-label="Next »">›</a>
               </li>
              @endif
              </ul>
            </div>
                   </td>
                </tr>
 @else  
  <tr>
    <td colspan="6" align="center">No Data Found</td>
  </tr> 
                  
 @endif