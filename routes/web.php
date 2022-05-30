<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\ProductComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\EditProductComponent;
use App\Http\Livewire\Admin\HomeSliderComponent;
use App\Http\Livewire\Admin\AddHomeSliderComponent;
use App\Http\Livewire\Admin\EditHomeSliderComponent;
use App\Http\Livewire\Admin\HomeCategoryComponent;
use App\Http\Livewire\Admin\SaleComponent;
use App\Http\Livewire\WishlistComponent; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/about-us', AboutUsComponent::class);
Route::get('/checkout', CheckoutComponent::class);
Route::get('/contact-us', ContactUsComponent::class);
Route::get('/shop', ShopComponent::class)->name('product.shop');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');;
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AddCategoryComponent::class)->name('admin.addCategory');
    Route::get('/admin/category/edit/{category_slug}', EditCategoryComponent::class)->name('admin.editCategory');
    Route::get('/admin/products', ProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AddProductComponent::class)->name('admin.addProduct');
    Route::get('/admin/product/edit/{product_slug}', EditProductComponent::class)->name('admin.editProduct');

    Route::get('/admin/slider', HomeSliderComponent::class)->name('admin.homeSlider');
    Route::get('/admin/slider/add', AddHomeSliderComponent::class)->name('admin.addHomeSlider');
    Route::get('/admin/slider/edit/{slide_id}', EditHomeSliderComponent::class)->name('admin.editHomeSlider');

    Route::get('/admin/home-categories', HomeCategoryComponent::class)->name('admin.homeCategories');

    Route::get('/admin/sale', SaleComponent::class)->name('admin.sale');

});
