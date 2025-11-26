<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [HomeController::class, 'product_detail'])->name('product.show');
Route::get('/catalog', [HomeController::class, 'product'])->name('products.index');
Route::get('/articles', [HomeController::class, 'article'])->name('articles.index');
Route::get('/articles/{slug}', [HomeController::class, 'article_detail'])->name('articles.show');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.show');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag.show');

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentCallbackController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/add-ajax/{productId}', [CartController::class, 'addToCartAjax'])->name('cart.add.ajax');
Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/my-purchases', [CheckoutController::class, 'purchases'])->name('purchases.index');
});

Route::post('/payment/notification', [PaymentCallbackController::class, 'handle'])->name('payment.notification');

Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [HomeController::class, 'terms'])->name('terms');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'avatar' => $googleUser->getAvatar(),
            'email_verified_at' => now(),
        ],
    );

    Auth::login($user);

    return redirect('/dashboard');
});
require __DIR__ . '/auth.php';
