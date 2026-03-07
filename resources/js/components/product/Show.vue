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
                                    <RouterLink :to="{ name: 'product.index' }">
                                        Products<i class="ti-arrow-right"></i>
                                    </RouterLink>
                                </li>
                                <li v-if="product">
                                    <RouterLink :to="{ name: 'product.show', params: { id: product.id }}">{{ product.title }}</RouterLink>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

        <!-- Shop Single -->
		<section class="shop single section">
            <div class="container">
                <div class="row"> 
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <!-- Product Slider -->
                                <div class="product-gallery">
                                    <!-- Images slider -->
                                    <div class="flexslider-thumbnails">
                                        <ul class="slides" v-if="product">
                                            <li :data-thumb="product.preview_image" rel="adjustX:10, adjustY:">
                                                <img :src="product.preview_image" alt="#">
                                            </li>
                                            <li v-for="image in product.images"
                                                :data-thumb="image.image_url" rel="adjustX:10, adjustY:">
                                                <img :src="image.image_url" alt="#">
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Images slider -->
                                </div>
                                <!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="product-des" v-if="product">
                                    <!-- Description -->
                                    <div class="short">
                                        <h4>{{ product.title }}</h4>
                                        <p class="price">{{ product.price }} €</p>
                                        <p class="description">{{ product.description }}</p>
                                    </div>
                                    <!--/ End Description -->
                                    <!-- Product Buy -->
                                    <div class="product-buy">
                                        <div class="quantity">
                                            <h6>Quantity:</h6>
                                            <!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button @click="changeQty('product', 'minus')" type="button" class="btn btn-primary btn-number">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                </div>
                                                <input @blur="validateQty('product')"
                                                    v-model.number="productQty"
                                                    min="1" :max="product.stock"
                                                    class="input-number [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                                    type="number" />
                                                <div class="button plus">
                                                    <button @click="changeQty('product', 'plus')" type="button" class="btn btn-primary btn-number">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--/ End Input Order -->
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#" class="btn" @click.prevent="addToCart(product.id, product.stock, productQty)">Add to cart</a>
                                            <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                        </div>
                                        <p class="cat">Category: <strong class="capitalize">{{ product.category.title }}</strong></p>
                                        <p class="availability">Availability: 
                                            <span v-if="product.stock > 0">{{ product.stock }} Products In Stock</span>
                                            <span v-else>Out of stock</span>
                                        </p>
                                    </div>
                                    <!--/ End Product Buy -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-info">
                                    <!-- Description Tab -->
                                    <div class="tab-pane fade show active" id="description" v-if="product">
                                        <div class="tab-single">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="mb-4">Product description</h4>
                                                    <div v-html="product.content"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Description Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</section>
		<!--/ End Shop Single -->
		
		<!-- Start Most Popular -->
        <div class="product-area most-popular related-product section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="grid grid-cols-4">
                            <!-- Start Single Product -->
                            <div class="single-product" v-for="product in relatedProducts">
                                <div class="product-img">
                                    <a>
                                        <img class="default-img" :src="product.preview_image" alt="#">
                                        <img class="hover-img" :src="product.preview_image" alt="#">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a @click="selectProduct(product)"
                                                data-toggle="modal" 
                                                data-target="#exampleModal" 
                                                title="Quick View" 
                                                href="#"
                                            ><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#" @click.prevent="addToCart(product.id, product.stock)">Add to cart</a>
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
                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Most Popular Area -->
	
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
                                        <div class="quickview-stock ml-0">
                                            <span v-if="selectedProduct.stock > 0">
                                                <i class="fa fa-check-circle-o"></i> in stock ({{ selectedProduct.stock }})
                                            </span>
                                            <span v-else class="text-red-600 font-semibold">
                                                Out of stock
                                            </span>
                                        </div>
                                    </div>

                                    <h3>{{ selectedProduct.price }} €</h3>

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
                                                <button @click="changeQty('selectedProduct', 'minus')" type="button" class="btn btn-primary btn-number">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input @blur="validateQty('selectedProduct')"
                                                v-model.number="selectedProductQty"
                                                min="1" :max="selectedProduct.stock"
                                                class="input-number [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                                type="number" />
                                            <div class="button plus">
                                                <button @click="changeQty('selectedProduct', 'plus')" type="button" class="btn btn-primary btn-number">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>

                                    <div class="add-to-cart d-block">
                                        <a href="#" class="btn" @click.prevent="addToCart(selectedProduct.id, selectedProduct.stock, selectedProductQty)">Add to cart</a>
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
    import { cart } from '../../composables/cart';

    export default {
        name: "ProductShow",
        data() {
            return {
                product: null,
                productQty: 1,
                relatedProducts: [],
                selectedProduct: null,
                selectedProductQty: 1,
                currentSlide: 0,
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
        setup() {
            const { addToCart } = cart();

            return {
                addToCart
            };
        },
        methods: {
            getProduct(id) {
                axios.get(`/api/products/${id}`).then(res => {
                    this.product = res.data.data;
                    this.getRelatedProducts();
                });
            },
            getRelatedProducts() {
                const payload = {
                    page: 1,
                    products_per_page: 4,
                    sort: 'newest',
                    category: this.product.category.id,
                    exclude_id: this.product.id,
                };
                
                axios.post('/api/products', payload).then(res => {
                    this.relatedProducts = res.data.data;
                });
            },
            selectProduct(product) {
                this.selectedProduct = product;
                this.selectedProductQty = 1;
                this.currentSlide = 0;
            },
            changeQty(type, operation) {
                const qtyKey = type === 'selectedProduct' ? 'selectedProductQty' : 'productQty';
                const product = type === 'selectedProduct' ? this.selectedProduct : this.product;
                
                if (operation === 'plus') {
                    if (this[qtyKey] < product.stock) {
                        this[qtyKey]++;
                    }
                } else {
                    if (this[qtyKey] > 1) {
                        this[qtyKey]--;
                    }
                }
            },
            validateQty(type) {
                const qtyKey = type === 'selectedProduct' ? 'selectedProductQty' : 'productQty';
                const product = type === 'selectedProduct' ? this.selectedProduct : this.product;
                
                this[qtyKey] = parseInt(this[qtyKey]) || 1;
                
                this[qtyKey] = Math.max(1, Math.min(this[qtyKey], product.stock));
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
            }
        },
        mounted() {
            this.getProduct(this.$route.params.id);
        },
        watch: {
            '$route.path'() {
                this.getProduct(this.$route.params.id);
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>