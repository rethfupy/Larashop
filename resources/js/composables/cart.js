import { ref, computed } from 'vue';
import axios from 'axios';

const cartItems = ref([]);
const loading = ref(false);

export function cart() {
    const getLocalCart = () => {
        const cart = localStorage.getItem('cart');
        return cart ? JSON.parse(cart) : [];
    };

    const saveLocalCart = (cart) => {
        localStorage.setItem('cart', JSON.stringify(cart));
    };

    const fetchCartProducts = async () => {
        const localCart = getLocalCart();
        
        if (localCart.length === 0) {
            cartItems.value = [];
            return;
        }

        loading.value = true;

        try {
            const response = await axios.post('/api/products/cart', {
                ids: localCart.map(item => item.id)
            });

            cartItems.value = response.data.data.map(product => {
                const cartItem = localCart.find(item => item.id === product.id);
                return {
                    ...product,
                    qty: cartItem.qty
                };
            });
        } catch (error) {
            console.error(error);
        } finally {
            loading.value = false;
        }
    };

    const addToCart = (id, stock, qty = 1) => {
        const cart = getLocalCart();
        const existingProduct = cart.find(p => p.id === id);
        const currentQtyInCart = existingProduct ? existingProduct.qty : 0;
        const newTotalQty = currentQtyInCart + qty;

        if (newTotalQty > stock) {
            alert(`Cannot add ${qty} more. Only ${stock - currentQtyInCart} available.`);
            return false;
        }

        if (existingProduct) {
            existingProduct.qty = newTotalQty;
        } else {
            cart.push({ id: id, qty: qty });
        }

        saveLocalCart(cart);
        fetchCartProducts();

        console.log(cart);
        
        return true;
    };

    const removeFromCart = (id) => {
        const cart = getLocalCart().filter(item => item.id !== id);
        saveLocalCart(cart);
        fetchCartProducts();
    };

    const updateQuantity = (id, qty) => {
        const cart = getLocalCart();
        const item = cart.find(p => p.id === id);
        
        if (item) {
            item.qty = qty;
            saveLocalCart(cart);
            fetchCartProducts();
        }
    };

    const clearCart = () => {
        localStorage.removeItem('cart');
        cartItems.value = [];
    };

    const cartCount = computed(() => {
        return cartItems.value.reduce((total, item) => total + item.qty, 0);
    });

    const cartTotal = computed(() => {
        return cartItems.value.reduce((total, item) => {
            return total + (item.price * item.qty);
        }, 0);
    });

    return {
        cartItems,
        loading,
        cartCount,
        cartTotal,
        addToCart,
        removeFromCart,
        updateQuantity,
        clearCart,
        fetchCartProducts
    };
}