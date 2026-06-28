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
                                    <RouterLink :to="{ name: 'checkout.index' }">Checkout</RouterLink>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row" v-if="cartItems.length > 0"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<form class="form" method="post" action="#" @submit.prevent="submitOrder">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>First Name<span>*</span></label>
											<input type="text" name="first_name" v-model="form.first_name" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Last Name<span>*</span></label>
											<input type="text" name="last_name" v-model="form.last_name" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="email" v-model="form.email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="text" name="phone" v-model="form.phone" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Country<span>*</span></label>
                                            <input type="text" name="country" v-model="form.country" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>State / Divition<span>*</span></label>
                                            <input type="text" name="state" v-model="form.state" placeholder="" required>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address Line 1<span>*</span></label>
											<input type="text" name="address_line" v-model="form.address_line" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address Line 2</label>
											<input type="text" name="address_line_2" v-model="form.address_line_2" placeholder="">
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>City<span>*</span></label>
                                            <input type="text" name="city" v-model="form.city" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Postal Code<span>*</span></label>
											<input type="text" name="postcode" v-model="form.postcode" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" name="create_new_account" type="checkbox" v-model="createAccount">
											<label>Create an account?</label>
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>{{ cartTotal }} €</span></li>
										<li>(+) Shipping<span>0 €</span></li>
										<li class="last">Total<span>{{ cartTotal }} €</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
										<label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
										<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="/public/client/images/payment-method.png" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="#" class="btn" @click.prevent="submitOrder">proceed to checkout</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
                <div class="empty-cart" v-else>
                    <i class="ti-shopping-cart"></i>
                    <h4>Your cart is currently empty</h4>
                    <p>Looks like you haven't added anything to your cart yet. Start exploring our products!</p>
                    <RouterLink :to="{ name: 'product.index' }" class="btn text-white">Continue Shopping</RouterLink>
                </div>
			</div>
		</section>
		<!--/ End Checkout -->
		
		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
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
		<!-- End Shop Services -->  
    </div>
</template>

<script>
    import axios from 'axios';
    import { cart } from '../../composables/cart';

    export default {
        name: "CheckoutIndex",
        data() {
            return {
                form: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    country: '',
                    state: '',
                    address_line: '',
                    address_line_2: '',
                    city: '',
                    postcode: '',
                },
                createAccount: false,
                submitting: false,
            };
        },
        setup() {
            const {
                cartCount,
                cartItems,
                cartTotal,
                clearCart
            } = cart();

            return {
                cartCount,
                cartItems,
                cartTotal,
                clearCart
            };
        },
        methods: {
            submitOrder() {
                if (this.submitting) {
                    return;
                }

                this.submitting = true;

                const payload = {
                    ...this.form,
                    total_price: this.cartTotal,
                    create_new_account: this.createAccount,
                    items: this.cartItems.map(item => ({
                        product_id: item.id,
                        qty: item.qty,
                        price: item.price,
                    })),
                };

                axios.post('/api/order/store', payload)
                    .then(() => {
                        this.clearCart();
                        this.$router.push({ name: 'main.index' });
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Could not place the order. Please check the form and try again.');
                    })
                    .finally(() => {
                        this.submitting = false;
                    });
            }
        }
    }
</script>

<style scoped>
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