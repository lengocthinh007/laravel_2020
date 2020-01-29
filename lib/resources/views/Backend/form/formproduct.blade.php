<form method="post" enctype="multipart/form-data">
               	{{csrf_field()}}
         				<div class="row">
                           <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
             
                <div class="form-group" >
                   <div class="form-group" >
                    <label>Name</label>
                    <input required type="text" name="name" class="form-control" value="{!! old('name',isset($data) ? $data['name'] : null) !!}">
                  	</div>       
                     <div class="form-group" >
                    <label>description</label><br>
                   <textarea required rows="5" class="form-control" name="description">{!! old('description',isset($data) ? $data['description'] : null) !!} </textarea>
                  </div>
                   <div class="form-group" >
                    <label>Content</label><br>
                   <textarea required rows="5" class="form-control" name="content">{!! old('content',isset($data) ? $data['pro_content'] : null) !!}</textarea>
                  </div>
                  <div class="form-group" >
                    <label>Meta title</label>
                    <input required type="text" name="title" class="form-control" value="{!! old('title',isset($data) ? $data['pro_title_seo'] : null) !!}">
                  </div>  
                    <div class="form-group" >
                    <label>Meta Description</label>
                    <input required type="text" name="description_seo" class="form-control" value="{!! old('description_seo',isset($data) ? $data['description_seo'] : null) !!}">
                  </div>  
                <div class="input-field">
                 <label class="active">Ảnh Details</label>
                   <div class="input-images-1" style="padding-top: .5rem;"></div>
                </div>
                  <input type="submit" name="submit" value="Lưu" class="btn btn-primary">
                  <a href="#" class="btn btn-danger">Hủy bỏ</a>
           
          </div>
         		</div>
         		<div class="col-lg-4">
					 <div class="form-group" >
                    <label>Category</label>
                    <select required name="cate" class="form-control">
                      <option value="0"> Vui lòng chọn danh mục cha </option>
                     <?php cate_parent($cate,0,"--",old('cate',isset($data) ? $data['cate_id'] : null)); ?>
                              </select>
                  </div>
                   <div class="form-group" >
                    <label>Price</label>
                    <input required type="number" name="price" class="form-control" value="{!! old('price',isset($data) ? $data['price'] : 0) !!}">
                  </div>    
                  <div class="form-group" >
                    <label>Sale</label>
                    <input required type="number" name="Sale" class="form-control" value="{!! old('Sale',isset($data) ? $data['pro_sale'] : 0) !!}">
                  </div>   
                  <div class="form-group" >
                    <label>Số lượng</label>
                    <input required type="number" name="pro_number" class="form-control" value="{!! old('pro_number',isset($data) ? $data['pro_number'] : 0) !!}">
                  </div>    
                    <div class="form-group" >
                    <label>Ảnh sản phẩm </label>
                      <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)" value="{!! old('img',isset($data) ? $data['image'] : null) !!}"> <br>
                             @if(isset($data['image']))
                              <img id="avatar" class="thumbnail thum" width="200px" height="200px" src="{{asset('public/Hinh/'.$data['image'])}}">
                              @else
                             <img id="avatar" class="thumbnail thum" width="300px" src="img/new_seo-10-512.png">
                              @endif
                             
                  </div>
				</div>
			</div>
				 </form>