<?php

use App\Livewire\Pages\Admin\Categories\CategoryForm;
use App\Livewire\Pages\Admin\Categories\CategoryList;
use App\Livewire\Pages\Admin\Dashboard\Dashboard;
use App\Livewire\Pages\Admin\Items\ItemForm;
use App\Livewire\Pages\Admin\Items\ItemList;
use App\Livewire\Pages\Admin\Items\ItemView;
use App\Livewire\Pages\Admin\Mainmenu\MenuForm;
use App\Livewire\Pages\Admin\Mainmenu\MenuList;
use App\Livewire\Pages\Admin\Subcategories\SubCategoryForm;
use App\Livewire\Pages\Admin\Subcategories\SubCategoryList;
use App\Livewire\Pages\Public\Auth\Login;
use App\Livewire\Pages\Public\Auth\Register;
use App\Livewire\Pages\Public\Cart\CartItems;
use App\Livewire\Pages\Public\Check\Checkout;
use App\Livewire\Pages\Public\Check\Myorder;
use App\Livewire\Pages\Public\Home\Home;
use App\Livewire\Pages\Public\Items\ItemDetails;
use App\Livewire\Pages\Public\Items\Items;
use App\Livewire\Pages\Public\Wish\WishLists;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('home');
// Route::get('{categorySlug}', Items::class)->name('public_items');
// Route::get('{itemSlug}', ItemDetails::class)->name('public_item_details');
Route::get('bs/{slug}', Items::class)->name('public_items');

Route::get('my-cart', CartItems::class)->name('cart');
Route::get('my-wish-list', WishLists::class)->name('wish_list');
Route::get('checkout', Checkout::class)->name('checkout');
Route::get('my-orders', Myorder::class)->name('my_orders');
Route::prefix('auth')->group(function() {
    Route::get('signin', Login::class)->name('signin');
    Route::get('signup', Register::class)->name('signup');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('admin')->group(function() {
        Route::get('dashboard', Dashboard::class)->name('dashboard');

        // main menu management
        Route::prefix('main-menus')->group(function() {
            Route::get('list', MenuList::class)->name('main_menu_list');
            Route::get('form', MenuForm::class)->name('main_menu_form');
            Route::get('form/{menuId}', MenuForm::class)->name('main_menu_form_edit');
        });

        // categories management
        Route::prefix('categories')->group(function() {
            Route::get('list', CategoryList::class)->name('category_list');
            Route::get('form', CategoryForm::class)->name('category_form');
            Route::get('form/{categoryId}', CategoryForm::class)->name('category_form_edit');
        });

        // sub-categories management
        Route::prefix('sub-categories')->group(function() {
            Route::get('list', SubCategoryList::class)->name('sub_category_list');
            Route::get('form', SubCategoryForm::class)->name('sub_category_form');
            Route::get('form/{subCategoryId}', SubCategoryForm::class)->name('sub_category_form_edit');
        });

        // items management
        Route::prefix('items')->group(function() {
            Route::get('list', ItemList::class)->name('item_list');
            Route::get('form', ItemForm::class)->name('item_form');
            Route::get('form/{itemId}', ItemForm::class)->name('item_form_edit');
            Route::get('view/{itemId}', ItemView::class)->name('item_view');
        });

    });
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
