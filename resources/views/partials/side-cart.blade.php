<!-- Side Cart Overlay -->
<div id="cartOverlay" class="cart-overlay" style="display: none;">
    <div class="cart-backdrop" onclick="closeSideCart()"></div>
    <div class="cart-panel" id="cartPanel">
        <!-- Close Button -->
        <button class="cart-close-btn" onclick="closeSideCart()">
            <i class="fas fa-times"></i>
        </button>
        
        <!-- Cart Header -->
        <div class="cart-header">
            <h3>ORDER SUMMARY</h3>
        </div>
        
        <!-- Cart Content -->
        <div class="cart-content">
            <!-- Loading State -->
            <div id="cartLoading" class="cart-loading" style="display: none;">
                <div class="text-center py-4">
                    <i class="fas fa-spinner fa-spin fa-2x text-muted"></i>
                    <p class="mt-2 text-muted">Loading cart...</p>
                </div>
            </div>
            
            <!-- Empty Cart State -->
            <div id="cartEmpty" class="cart-empty" style="display: none;">
                <div class="text-center py-5">
                    <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Your cart is empty</h5>
                    <p class="text-muted">Add some products to get started</p>
                </div>
            </div>
            
            <!-- Cart Items -->
            <div id="cartItems" class="cart-items">
                <!-- Items will be loaded here -->
            </div>
        </div>
        
        <!-- Cart Footer -->
        <div class="cart-footer">
            <!-- Total -->
            <div class="cart-total">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-bold">GRAND TOTAL INCL. TAX</span>
                    <span class="fw-bold fs-5" id="cartGrandTotal">0đ</span>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="cart-actions">
                <button class="btn btn-outline-dark w-100 mb-2" onclick="closeSideCart()">
                    CONTINUE SHOPPING
                </button>
                <button class="btn btn-dark w-100" onclick="proceedToCheckout()">
                    PROCEED TO CHECKOUT
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Side Cart Styles */
.cart-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    display: flex;
    justify-content: flex-end;
}

.cart-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    cursor: pointer;
}

.cart-panel {
    position: relative;
    width: 100%;
    max-width: 400px;
    height: 100%;
    background: white;
    box-shadow: -10px 0 25px rgba(0, 0, 0, 0.15);
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.cart-panel.open {
    transform: translateX(0);
}

.cart-close-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    font-size: 18px;
    color: #666;
    cursor: pointer;
    z-index: 10;
    padding: 5px;
    transition: color 0.2s;
}

.cart-close-btn:hover {
    color: #000;
}

.cart-header {
    padding: 25px 20px 20px;
    border-bottom: 1px solid #eee;
    flex-shrink: 0;
}

.cart-header h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 1px;
    color: #333;
}

.cart-content {
    flex: 1;
    overflow-y: auto;
    padding: 0;
}

.cart-items {
    padding: 20px;
}

.cart-item {
    display: flex;
    align-items: flex-start;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
    gap: 15px;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item-image {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
    background: #f8f9fa;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cart-item-details {
    flex: 1;
    min-width: 0;
}

.cart-item-name {
    font-weight: 500;
    font-size: 14px;
    color: #333;
    margin: 0 0 5px;
    line-height: 1.3;
}

.cart-item-size {
    font-size: 12px;
    color: #666;
    margin: 0 0 8px;
}

.cart-item-price {
    font-weight: 600;
    color: #333;
    font-size: 14px;
}

.cart-item-controls {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
}

.cart-item-remove {
    background: none;
    border: none;
    color: #999;
    cursor: pointer;
    padding: 2px;
    font-size: 12px;
    transition: color 0.2s;
}

.cart-item-remove:hover {
    color: #dc3545;
}

.cart-item-quantity {
    display: flex;
    align-items: center;
    gap: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
}

.cart-item-quantity button {
    background: #f8f9fa;
    border: none;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.cart-item-quantity button:hover {
    background: #e9ecef;
}

.cart-item-quantity span {
    min-width: 25px;
    text-align: center;
    font-size: 14px;
    padding: 0 5px;
}

.cart-footer {
    padding: 20px;
    border-top: 1px solid #eee;
    background: white;
    flex-shrink: 0;
}

.cart-total {
    margin-bottom: 20px;
}

.cart-actions .btn {
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0.5px;
    padding: 12px 24px;
    text-transform: uppercase;
}

.cart-actions .btn-outline-dark {
    border: 2px solid #333;
    color: #333;
}

.cart-actions .btn-outline-dark:hover {
    background: #333;
    color: white;
}

.cart-actions .btn-dark {
    background: #333;
    border: 2px solid #333;
}

.cart-actions .btn-dark:hover {
    background: #000;
    border-color: #000;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .cart-panel {
        max-width: 100%;
    }
    
    .cart-item {
        gap: 10px;
    }
    
    .cart-item-image {
        width: 60px;
        height: 60px;
    }
    
    .cart-header {
        padding: 20px 15px 15px;
    }
    
    .cart-content {
        padding: 0;
    }
    
    .cart-items {
        padding: 15px;
    }
    
    .cart-footer {
        padding: 15px;
    }
}
</style>
