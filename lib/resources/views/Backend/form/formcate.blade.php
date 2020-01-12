 <form method="post" enctype="multipart/form-data">
                <div class="form-group" >
                   <div class="form-group" >
                    <label>Category Parent</label>
                    <select required name="parent_id" class="form-control">
                      <option value="0"> Vui lòng chọn danh mục cha </option>
                     <?php cate_parent($parent,0,"--",old('parent_id',isset($data) ? $data['parent_id'] : null)); ?>
                              </select>
                  </div>
                    <label>Category Name</label>
                    <input required type="text" name="name" class="form-control"
                    value="{!! old('name',isset($data) ? $data['name'] : null) !!}" 
                    >
                  </div>
                  <div class="form-group" >
                    <label>Category Order</label>
                    <input required type="text" name="order" class="form-control" value="{!! old('order',isset($data) ? $data['order'] : null) !!}">
                     @if($errors->has('order'))
                     <span class="err">{{ $errors->first('order') }}</span>
                    @endif
                  </div>
                  <div class="form-group" >
                    <label>Category Keywords</label>
                    <input required type="text" name="keywords" class="form-control" value="{!! old('keywords',isset($data) ? $data['keywords'] : null) !!}">
                  </div>              
                  <div class="form-group" >
                    <label>Category Description</label><br>
                   <textarea required rows="5" cols="96" name="description">{!! old('description',isset($data) ? $data['description'] : null) !!} </textarea>
                   @if($errors->has('description'))
                     <span class="err">{{ $errors->first('description') }}</span>
                    @endif
                  </div>
               
                 
                  <input type="submit" name="submit" value="Lưu" class="btn btn-primary">
                  <a href="#" class="btn btn-danger">Hủy bỏ</a>
             
               {{csrf_field()}}
            </form>