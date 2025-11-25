# Implementation Plan - E-Commerce Features & Midtrans Integration

This plan outlines the steps to implement Add to Cart, Buy Now, Midtrans Payment Gateway, and Post-Purchase Product Access.

## User Review Required

> [!IMPORTANT]
> Please review the proposed database schema changes and the flow for post-purchase access.

- **Midtrans Credentials**: We will need your Midtrans Server Key and Client Key in the `.env` file.
- **Post-Purchase Flow**: After payment, users will be redirected to a "My Purchases" page to access their products.

## Proposed Changes

### 1. Database Schema & Models

#### Fix Migrations
- Ensure `carts` and `cart_items` tables are created successfully.
- **Carts Table**: `id` (UUID), `user_id` (nullable UUID), `session_id` (string), timestamps.
- **Cart Items Table**: `id` (UUID), `cart_id` (UUID), `product_id` (UUID), `quantity` (int), timestamps.

#### Models
- **Cart**: Relationships to `CartItem`, `User`.
- **CartItem**: Relationship to `Product`.
- **Order**: Ensure relationships to `OrderItem` and `User` are set.
- **OrderItem**: Link to `Product`.

### 2. Cart Functionality

#### Backend (`CartController`)
- `index()`: Display cart items.
- `addToCart(Request $request, $productId)`: Add item to cart (handle guest vs auth users via session or user_id).
- `remove($itemId)`: Remove item from cart.

#### Frontend
- **Product Detail Page**: Wire up "Add to Cart" button to submit a POST request to `cart.add`.
- **Cart Page**: Create a new view `resources/views/cart/index.blade.php` showing items, subtotal, and "Checkout" button.

### 3. Checkout & Payment (Midtrans)

#### Configuration
- Add `MIDTRANS_SERVER_KEY`, `MIDTRANS_CLIENT_KEY`, `MIDTRANS_IS_PRODUCTION` to `.env`.
- Create `config/midtrans.php`.

#### Backend (`CheckoutController`)
- `index()`: Show order summary before payment.
- `process(Request $request)`:
    - Create `Order` record with `pending` status.
    - Create `OrderItem` records from Cart.
    - Generate Midtrans Snap Token.
    - Return Snap Token to frontend.

#### Frontend (Checkout)
- Use Midtrans Snap.js to handle payment popup.
- On success, redirect to "My Purchases".

#### Payment Callback (`PaymentCallbackController`)
- Handle notification from Midtrans.
- Update `Order` status to `paid` (or `failed`/`expired`).
- Secure endpoint (verify signature).

### 4. Post-Purchase Access

#### Backend
- **Access Control**: Ensure users can only access products they have purchased (status `paid`).
- `PurchasesController` (or reuse `HomeController`): List purchased products.
- `DownloadController`: Handle secure file download or link redirection.

#### Frontend
- **My Purchases Page**: List all purchased products with "Download" or "Access Link" buttons.
- **Product Page**: If purchased, show "Download/Access" instead of "Buy Now".

## Verification Plan

### Automated Tests
- Test adding items to cart.
- Test order creation.

### Manual Verification
- **Cart**: Add items, check persistence, remove items.
- **Checkout**: Go through checkout flow, trigger Midtrans popup.
- **Payment**: Simulate successful payment (using Midtrans Sandbox), verify Order status updates to `paid`.
- **Access**: Verify "My Purchases" page shows the product and link works.
