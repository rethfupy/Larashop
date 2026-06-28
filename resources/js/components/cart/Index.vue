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
                                    <RouterLink :to="{ name: 'cart.index' }">Cart</RouterLink>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- Shopping Cart -->
        <div class="shopping-cart section"  v-if="cartItems.length > 0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">TOTAL</th> 
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in cartItems">
                                    <td class="image" data-title="No">
                                        <img :src="item.preview_image" :alt="item.title">
                                    </td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name">
                                            <RouterLink :to="{ name: 'product.show', params: { id: item.id }}">{{ item.title }}</RouterLink>
                                        </p>
                                        <p class="product-des">{{ item.description }}</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>{{ item.price }} €</span></td>
                                    <td class="qty" data-title="Qty">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button @click="changeQty(item, 'minus')" type="button" class="btn btn-primary btn-number">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input @blur="validateQty(item)"
                                                v-model.number="item.qty"
                                                min="1" :max="item.stock"
                                                class="input-number [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                                type="number" />
                                            <div class="button plus">
                                                <button @click="changeQty(item, 'plus')" type="button" class="btn btn-primary btn-number">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>{{ item.price * item.qty }} €</span></td>
                                    <td class="action" data-title="Remove">
                                        <a 
                                            href="#" 
                                            @click.prevent="removeFromCart(item.id)" 
                                            class="remove" 
                                            title="Remove this item"
                                        >
                                            <i class="ti-trash remove-icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Total Amount -->
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-5 col-12">
                                </div>
                                <div class="col-lg-4 col-md-7 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>Cart Subtotal<span>{{ cartTotal }} €</span></li>
                                            <li>Shipping<span>Free</span></li>
                                            <li>Discount<span>0 €</span></li>
                                            <li class="last">You Pay<span>{{ cartTotal }} €</span></li>
                                        </ul>
                                        <div class="button5">
                                            <a href="#" class="btn">Checkout</a>
                                            <a href="#" class="btn">Continue shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Total Amount -->
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-cart section" v-else>
            <div class="empty-cart">
                <i class="ti-shopping-cart"></i>
                <h4>Your cart is currently empty</h4>
                <p>Looks like you haven't added anything to your cart yet. Start exploring our products!</p>
                <RouterLink :to="{ name: 'main.index' }" class="btn text-white">Continue Shopping</RouterLink>
            </div>
        </div>
        <!--/ End Shopping Cart -->
                
        <!-- Start Shop Services Area  -->
        <section class="shop-services section pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Service -->
                        <div class="single-service">
                            <i class="ti-rocket"></i>
                            <h4>Free shiping</h4>
                            <p>Orders over 100 €</p>
                        </div>
                        <!-- End Single Service -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Service -->
                        <div class="single-service">
                            <i class="ti-reload"></i>
                            <h4>Free Return</h4>
                            <p>Within 30 days returns</p>
                        </div>
                        <!-- End Single Service -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Service -->
                        <div class="single-service">
                            <i class="ti-lock"></i>
                            <h4>Sucure Payment</h4>
                            <p>100% secure payment</p>
                        </div>
                        <!-- End Single Service -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Service -->
                        <div class="single-service">
                            <i class="ti-tag"></i>
                            <h4>Best Peice</h4>
                            <p>Guaranteed price</p>
                        </div>
                        <!-- End Single Service -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shop Newsletter -->
    </div>
</template>

<script>
    import { cart } from '../../composables/cart';

    export default {
        name: "CartIndex",
        setup() {
            const {
                cartItems,
                cartCount,
                cartTotal,
                removeFromCart,
                updateQuantity,
                fetchCartProducts
            } = cart();

            return {
                cartItems,
                cartCount,
                cartTotal,
                removeFromCart,
                updateQuantity,
                fetchCartProducts
            };
        },
        mounted() {
            this.fetchCartProducts();
        },
        methods: {
            changeQty(item, operation) {
                let qty = item.qty;

                if (operation === 'plus') {
                    if (qty < item.stock) {
                        qty++;
                    }
                } else {
                    if (qty > 1) {
                        qty--;
                    }
                }

                this.updateQuantity(item.id, qty);
            },
            validateQty(item) {
                const qty = Math.max(1, Math.min(parseInt(item.qty) || 1, item.stock));

                this.updateQuantity(item.id, qty);
            },
        }
    }
</script>

<style scoped>
    .pb-80 {
        padding-bottom: 80px;
    }

    .empty-cart {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-cart i {
        font-size: 60px;
        color: #ccc;
        display: inline-block;
        margin-bottom: 20px;
    }

    .empty-cart h4 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .empty-cart p {
        font-size: 14px;
        color: #888;
        margin-bottom: 25px;
    }

    .empty-cart .btn {
        padding: 12px 30px;
    }
</style>