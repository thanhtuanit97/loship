        <!-- product section start -->
        <div class="">
        	<div class="container">
        		<!-- area title start -->
        		<div class="area-title">
        			<h2>Sản Phẩm Bạn Vừa Xem</h2>
        		</div>
        		<!-- area title end -->
        		<!-- our-product area start -->
        		<div class="row">
        			<div class="col-md-12">
        				<div class="features-tab">
        				
        					<!-- Tab pans -->
        					<div class="tab-content">
        						{{-- home --}}
        						<div role="tabpanel" class="tab-pane fade in active" id="home">
        							<div class="row">
                                
                                        @if(isset($products))
                                      
                                           @foreach($products as $product)
                                           <div class="col-lg-3 col-md-3">
                                              <!-- single-product start -->
                                              <div class="single-product first-sale " id="pro-{{ $product->id}}">
                                                 <!-- Hiển Thị logo giảm giá cho sản phẩm -->


                                                 @foreach($product->coupons as $value)
                                                 @if(!$value->expired)
                                                 <span class="sale-text">
                                                    @if($value['condition'] == 1)
                                                    Giảm {{ $value['number']}} %
                                                    @else
                                                    Giảm {{ $value['number']}} đ
                                                    @endif
                                                </span>
                                                @endif
                                                @endforeach

                                                <div class="product-img">
                                                    <a href="{{ route('product-details', $product->id)}}">
                                                       <img class="primary-image" src="{{ pare_url_file($product['avatar'])}}" alt="" style="width: 540px; height: 330px" />
                                                       <img class="secondary-image" src="{{ pare_url_file($product['avatar'])}}" alt="" style="width: 540px; height: 330px"/>
                                                   </a>
                                                 <form action="{{route('cart.save')}}" method="POST">
                                                        @csrf
                                                           <input type="hidden" name="product_hidden"  value="{{ $product->id }}" >
                                                   <div class="action-zoom">
                                                       <div class="add-to-cart">
                                                          <a href="{{ route('product-details', $product->id)}}" title="Xem Chi Tiết"><i class="fa fa-search-plus"></i></a>
                                                      </div>
                                                  </div>
                                                  <div class="actions">
                                                    @if($product->quantity == 0)
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                             <div class="add-to-wishlist">
                                                                <a href="#" title="Yêu Thích"><i class="fa fa-heart"></i></a>
                                                             </div>
                                                                                          
                                                        </div>
                                                        <div class="quickviewbtn">
                                                         <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                             <div class="add-to-wishlist">
                                                                <a href="#" title="Yêu Thích"><i class="fa fa-heart"></i></a>
                                                             </div>
                                                            <div class="compare-button ">
                                                               <button style="border:none; background-color: #fff;"><a  title="Thêm Vào Giỏ Hàng"><i class="icon-bag addTocart" productId = {{ $product->id}}></i></a></button> 
                                                            </div>									
                                                        </div>
                                                        <div class="quickviewbtn">
                                                         <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                    @endif
                                         </div>
                                    
                                         <div class="price-box">

                                           <!-- Hiển thị giá sản phẩm sau khi giảm -->
                                           @foreach($product->coupons as $value)
                                           @if(!$value->expired)
                                           @php 
                                           $number = $value['number'];
                                           $sale = ($product['price']*$number)/100;
                                           $price_sale = $product['price'] - $sale;
                                           @endphp
                                           <span class="new-price priceSale" style="color: red">Giảm còn : {{ number_format($price_sale).' '.'đ' }}</span>
                                           <input type="hidden" name="priceSaleHidden"  value="{{ $price_sale }}" >

                                           @endif
                                           @endforeach

                                           <span class="new-price priceDB" id="price_hidden">{{ number_format($product['price']).' '.'đ' }}</span>	


                                       </div> 
                                       </form>
                                   </div>
                                    <div class="product-content">
                                    <h2 id="product-name" class="product-name"><a href="{{ route('product-details', $product->id)}}">{{ $product['name']}}</a></h2>
                                 

                                    </div>
                            </div>
                            <!-- single-product end -->
                        </div>

                        @endforeach
                        <!-- single-product end -->
                  
                    @endif
               
                </div>
            </div>
            {{-- profile --}}
            <div role="tabpanel" class="tab-pane fade" id="profile">
             <div class="row">
                <div class="features-curosel">
                   <div class="col-lg-12 col-md-12">
                      <!-- single-product start -->
                      <div class="single-product first-sale">
                         <span class="sale-text">Sale</span>
                         <div class="product-img">
                            <a href="#">
                               <img class="primary-image" src="images/products/product-11.jpg" alt="" />
                               <img class="secondary-image" src="images/products/product-2.jpg" alt="" />
                           </a>
                           <div class="action-zoom">
                               <div class="add-to-cart">
                                  <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                              </div>
                          </div>
                          <div class="actions">
                           <div class="action-buttons">
                              <div class="add-to-links">
                                 <div class="add-to-wishlist">
                                    <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="compare-button">
                                    <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                </div>									
                            </div>
                            <div class="quickviewbtn">
                             <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                         </div>
                     </div>
                 </div>
                 <div class="price-box">
                   <span class="new-price">$110.00</span>
               </div>
           </div>
           <div class="product-content">
            <h2 class="product-name"><a href="#">Pellentesque habitant</a></h2>
            <p>Nunc facilisis sagittis ullamcorper...</p>
        </div>
    </div>
    <!-- single-product end -->
</div>	
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
<!-- our-product area end -->	


</div>
</div>
<!-- product section end -->