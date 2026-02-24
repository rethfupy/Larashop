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
								<!-- Categories -->
								<div v-if="filterList" class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										<li v-for="category in filterList.categories">
                                            <a href="#" 
                                                @click.prevent="applyFilter('category', category.id)"
                                                :class="categoryId === category.id ? 'text-orange-500!' : ''"
                                            >{{ category.title }}</a>
                                        </li>
									</ul>
								</div>
								<!--/ End Categories -->
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
                                </div>
                                <!--/ End Shop By Price -->
								<!-- Tags -->
								<div v-if="filterList" class="single-widget category">
									<h3 class="title">Tags</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <a v-for="tag in filterList.tags" href="#" 
                                            @click.prevent="applyFilter('tags', tag.id)"
                                            :class="tags.includes(tag.id) ? 'text-orange-500!' : ''"
                                            class="capitalize"
                                        >{{ tag.title }}</a>
                                    </div>
								</div>
								<!--/ End Tags -->                                
								<!-- Recent items -->
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
								<!--/ End Recent items -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top py-4">
									<div class="flex gap-4">
										<div class="flex items-center gap-2"> <!-- single-shorter -->
											<label class="mb-0">Show:</label>
											<select class="no-nice-select px-4 py-2.5 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 cursor-pointer" 
                                                v-model.number="productsPerPage" 
                                                @change="changeProductsPerPage(productsPerPage)"
                                            >
												<option :value="9">09</option>
												<option :value="15">15</option>
												<option :value="25">25</option>
												<option :value="30">30</option>
											</select>
										</div>
										<div class="flex items-center gap-2">
											<label class="mb-0">Sort By:</label>
											<select class="no-nice-select px-4 py-2.5 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 cursor-pointer"
                                                v-model="sort"
                                                @change="changeSort(sort)"
                                            >
												<option value="newest">Newest first</option>
												<option value="oldest">Oldest first</option>
												<option value="price_asc">Price: Low to High</option>
                                                <option value="price_desc">Price: High to Low</option>
                                                <option value="name_asc">Name: A to Z</option>
                                                <option value="name_desc">Name: Z to A</option>
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
                                        <a>
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
                                            <RouterLink :to="{ name: 'product.show', params: { id: product.id }}">{{ product.title }}</RouterLink>
                                        </h3>
                                        <div class="product-price">
                                            <span>{{ product.price }} €</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
                        <div class="row" v-if="pagination && pagination.last_page > 1">
                            <div class="col-12">
                                <!-- Pagination -->
								<div class="flex items-center justify-center gap-2 py-4">
                                    <!-- Previous -->
                                    <button @click.prevent="getProducts(pagination.current_page - 1)"
                                        :disabled="pagination.current_page === 1"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed!"
                                    >Previous</button>

                                    <template v-for="link in pagination.links">
                                        <button v-if="Number(link.label) &&
                                                (pagination.current_page - link.label < 2 &&
                                                pagination.current_page - link.label > -2) ||
                                                Number(link.label) === 1 || 
                                                Number(link.label) === pagination.last_page"
                                            @click.prevent="getProducts(link.label)"
                                            :disabled="link.active"
                                            :class="link.active ? 'text-white bg-blue-600 border-blue-600' : 'text-gray-700 bg-white border-gray-300'"
                                            class="px-3 py-2 text-sm font-medium border rounded-md hover:bg-gray-50"
                                        >{{ link.label }}</button>

                                        <span v-if="(Number(link.label) &&
                                                pagination.current_page !== 3 &&
                                                pagination.current_page - link.label === 2) ||
                                                (Number(link.label) &&
                                                pagination.current_page !== pagination.last_page - 2 &&
                                                pagination.current_page - link.label === -2)"
                                            class="px-2 text-gray-500"
                                        >...</span>
                                    </template>

                                    <!-- Next -->
                                    <button @click.prevent="getProducts(pagination.current_page + 1)"
                                        :disabled="pagination.current_page === pagination.last_page"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed!"
                                    >Next</button>
                                </div>
                                <!--/ End Pagination -->
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
                                <!-- Single Image (no slider) -->
                                <div v-if="!hasMultipleImages" class="bg-center bg-cover bg-no-repeat h-100 w-100"
                                    :style="{ backgroundImage: `url(${selectedProduct.preview_image})` }"
                                ></div>
                                <!-- Product Slider -->
                                <div v-else class="relative h-100">
                                    <!-- Main Image -->
                                    <div 
                                        class="w-full h-100 bg-center bg-cover bg-no-repeat rounded transition-all duration-300"
                                        :style="{ backgroundImage: `url(${allImages[currentSlide]})` }"
                                    ></div>

                                    <!-- Previous Button -->
                                    <button 
                                        @click="prevSlide"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-lg transition"
                                    >
                                        <i class="ti-angle-left text-xl"></i>
                                    </button>

                                    <!-- Next Button -->
                                    <button 
                                        @click="nextSlide"
                                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-lg transition"
                                    >
                                        <i class="ti-angle-right text-xl"></i>
                                    </button>

                                    <!-- Dot Indicators -->
                                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                                        <button
                                            v-for="(image, index) in allImages"
                                            :key="index"
                                            @click="goToSlide(index)"
                                            class="w-2 h-2 rounded-full transition-all duration-300"
                                            :class="currentSlide === index ? 'bg-white w-8' : 'bg-white/50'"
                                        ></button>
                                    </div>
                                </div>
                                <!-- End Product slider -->
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
                currentSlide: 0,
                filterList: null,
                categoryId: null,
                minPrice: null,
                maxPrice: null,
                tags: [],
                pagination: [],
                productsPerPage: 9,
                sort: 'newest',
            }
        },
        computed: {
            allImages() {
                if (!this.selectedProduct) { return [] };

                const images = [this.selectedProduct.preview_image];

                if (this.selectedProduct.images && this.selectedProduct.images.length > 0) {
                    images.push(...this.selectedProduct.images.map(img => img.image_url));
                }

                return images;
            },
            hasMultipleImages() {
                return this.allImages.length > 1;
            }
        },
        methods: {
            getProducts(page = 1) {
                const payload = {
                    'page': page,
                    'products_per_page': this.productsPerPage,
                    'sort': this.sort,
                };

                if (this.categoryId) {
                    payload.category = this.categoryId;
                }

                if (this.minPrice !== null && this.maxPrice !== null) {
                    payload.price = {
                        from: this.minPrice,
                        to: this.maxPrice,
                    };
                }

                if (this.tags.length > 0) {
                    payload.tags = this.tags;
                }

                axios.post('/api/products', payload).then(res => {
                    this.products = res.data.data;
                    this.pagination = res.data.meta;
                });
            },
            selectProduct(product) {
                this.selectedProduct = product;
                this.selectedProductQty = 1;
                this.currentSlide = 0;
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
            },
            nextSlide() {
                if (this.currentSlide < this.allImages.length - 1) {
                    this.currentSlide++;
                } else {
                    this.currentSlide = 0;
                }
            },
            prevSlide() {
                if (this.currentSlide > 0) {
                    this.currentSlide--;
                } else {
                    this.currentSlide = this.allImages.length - 1;
                }
            },
            goToSlide(index) {
                this.currentSlide = index;
            },
            getFilterList() {
                axios.get('/api/products/filters').then(res => {
                    this.filterList = res.data;
                    const vm = this;

                    /*=======================
                    Slider Range jQuery plugin
                    =========================*/ 
                    $( function() {
                        $( "#slider-range" ).slider({
                            range: true,
                            min: Number(vm.filterList.price.min),
                            max: Number(vm.filterList.price.max),
                            values: [ Number(vm.filterList.price.min), Number(vm.filterList.price.max) ],
                            slide: function( event, ui ) {
                                vm.applyFilter('price', ui.values);
                                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                            }
                        });
                        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
                    } );                    
                });
            },
            applyFilter(type, value) { 
                if (type === "category") {
                    this.categoryId = value !== this.categoryId ? value : null;
                }
                if (type === "tags") {
                    if (!this.tags.includes(value)) {
                        this.tags.push(value);
                    } else {
                        const idx = this.tags.indexOf(value);
                        this.tags.splice(idx, 1);
                    }
                }
                if (type === "price") {
                    this.minPrice = value[0];
                    this.maxPrice = value[1];
                }

                this.getProducts();
            },
            changeProductsPerPage(value) {
                this.productsPerPage = value;
                this.getProducts();
            },
            changeSort(value) {
                this.sort = value;
                this.getProducts();
            }
        },
        mounted() {
            this.getProducts();
            this.getFilterList();
        }
    }
</script>

<style lang="scss" scoped>

</style>