<template>
    <div>
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
                                <li>
                                    <RouterLink :to="{ name: 'main.index' }">Home<i class="ti-arrow-right"></i></RouterLink>
                                </li>
                                <li>
                                    <RouterLink :to="{ name: 'product.index' }">Products</RouterLink>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										<li><a href="#">T-shirts</a></li>
										<li><a href="#">jacket</a></li>
										<li><a href="#">jeans</a></li>
										<li><a href="#">sweatshirts</a></li>
										<li><a href="#">trousers</a></li>
										<li><a href="#">kitwears</a></li>
										<li><a href="#">accessories</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Shop by Price</h3>
										<div class="price-filter">
											<div class="price-filter-inner">
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
													</div>
												</div>
											</div>
										</div>
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
											</li>
										</ul>
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Girls Dress</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Women Clothings</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Man Tshirt</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row" v-if="products">
                            <div class="col-lg-4 col-md-6 col-12" v-for="product in products">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="default-img" :src="product.preview_image" alt="#">
                                            <img class="hover-img" :src="product.preview_image" alt="#">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action pr-1">
                                                <a @click="selectProduct(product)"
                                                    data-toggle="modal" 
                                                    data-target="#exampleModal" 
                                                    title="Quick View" 
                                                    href="#"
                                                ><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3>
                                            <a href="product-details.html">{{ product.title }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span>{{ product.price }} €</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	
		
		<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div v-if="selectedProduct" class="row no-gutters h-100">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="bg-center bg-cover bg-no-repeat h-100 w-100"
                                    :style="{ backgroundImage: `url(${selectedProduct.preview_image})` }"
                                ></div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>{{ selectedProduct.title }}</h2>
                                    <div class="quickview-ratting-review">
                                        <!--  
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        -->
                                        <div class="quickview-stock ml-0">
                                            <span v-if="selectedProduct.stock > 0">
                                                <i class="fa fa-check-circle-o"></i> in stock ({{ selectedProduct.stock }})
                                            </span>
                                            <span v-else class="text-red-600 font-semibold">
                                                Out of stock
                                            </span>
                                        </div>
                                    </div>

                                    <h3>{{ selectedProduct.price }}€</h3>

                                    <div class="quickview-peragraph mb-2">
                                        <p class="mb-2">{{ selectedProduct.description }}</p>
                                        <div v-if="selectedProduct.tags" class="flex flex-wrap gap-2">
                                            <span v-for="tag in selectedProduct.tags"
                                                class="bg-orange-400 px-2 rounded-md"
                                            >{{ tag.title }}</span>
                                        </div>
                                    </div>

                                    <div class="quantity mb-2">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button @click="changeQty('minus')" type="button" class="btn btn-primary btn-number">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input @blur="validateQty"
                                                v-model.number="selectedProductQty"
                                                min="1" :max="selectedProduct.stock"
                                                class="input-number [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                                type="number" />
                                            <div class="button plus">
                                                <button @click="changeQty('plus')" type="button" class="btn btn-primary btn-number">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>

                                    <div class="add-to-cart d-block">
                                        <a href="#" class="btn">Add to cart</a>
                                        <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    </div>
                                    <div class="default-social">
                                        <h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
	</div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "ProductIndex",
        data() {
            return {
                products: null,
                selectedProduct: null,
                selectedProductQty: 1,
            }
        },
        methods: {
            getProducts() {
                axios.get('/api/products').then(res => {
                    this.products = res.data.data;
                });
            },
            selectProduct(product) {
                this.selectedProduct = product;
                this.selectedProductQty = 1;
            },
            changeQty(operation) {
                if (operation === 'plus') {
                    if (this.selectedProductQty < this.selectedProduct.stock) {
                        this.selectedProductQty++;
                    }
                } else {
                    if (this.selectedProductQty > 1) {
                        this.selectedProductQty--;
                    }
                }                
            },
            validateQty() {
                this.selectedProductQty = parseInt(this.selectedProductQty) || 1;

                if (this.selectedProductQty < 1) {
                    this.selectedProductQty = 1;
                }

                if (this.selectedProductQty > this.selectedProduct.stock) {
                    this.selectedProductQty = this.selectedProduct.stock;
                }
            }
        },
        mounted() {
            this.getProducts();
        }
    }
</script>

<style lang="scss" scoped>

</style>