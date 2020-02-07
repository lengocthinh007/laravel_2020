@if($products)
<div  class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Sản phẩm vừa xem</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">
                        
                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">
                            @foreach($products as $item)
                            <?php
                             $price=$item->price;
                                if($item->pro_sale)
                                {
                                  $price=$price * (100 - $item->pro_sale)/100;
                                }
                            ?>
                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{asset('public/Hinh/'.$item->image)}}" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">{!! number_format($price,0,',','.') !!}<span>@if($item->pro_sale){!! number_format($item->price,0,',','.') !!}
                                        @endif</span></div>
                                        <div class="viewed_name"><a href="{{asset('Details/'.$item->id.'/'.$item->alias)}}">{{$item->name}}</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        @if($item->pro_sale)
                                        <li class="item_mark item_discount">-{{$item->pro_sale}}%</li>
                                        @endif
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                             @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif