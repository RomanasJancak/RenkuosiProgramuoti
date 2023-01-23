<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'users'], function(){
    Route::get('', [UserController::class, 'index'])->name('user.index')->middleware('auth');
    //Route::get('', [App\Http\Controllers\UserController::class, 'index'])->name('user.index')->midleware('auth');
    //Route::get('create', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
    //Route::post('store', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('show/{user}', [UserController::class, 'show'])->name('user.show');
});

Route::group(['prefix' => 'budgets'], function(){
    Route::get('', [App\Http\Controllers\BudgetController::class, 'index'])->name('budget.index');
    Route::get('create/{user}', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
    Route::post('store/{user}', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
    Route::get('edit/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'edit'])->name('budget.edit');
    Route::post('update/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'update'])->name('budget.update');
    Route::get('delete/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy');
    Route::get('show/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'show'])->name('budget.show');
  });
Route::group(['prefix' => 'apsipirkimai'], function(){
    Route::get('', [App\Http\Controllers\ApsipirkimasController::class, 'index'])->name('apsipirkimas.index');
    Route::get('create/{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'create'])->name('apsipirkimas.create');
    Route::post('store/{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'store'])->name('apsipirkimas.store');
    Route::get('edit/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'edit'])->name('apsipirkimas.edit');
    Route::post('update/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'update'])->name('apsipirkimas.update');
    Route::get('delete/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'destroy'])->name('apsipirkimas.destroy');
    Route::get('show/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'show'])->name('apsipirkimas.show');
 });
Route::group(['prefix' => 'pirkiniai'], function(){
    Route::get('', [App\Http\Controllers\PirkinysController::class, 'index'])->name('pirkinys.index');
    Route::get('create/{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'create'])->name('pirkinys.create');
    Route::post('store/{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'store'])->name('pirkinys.store');
    Route::get('edit/{pirkinys},{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'edit'])->name('pirkinys.edit');
    Route::post('update/{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'update'])->name('pirkinys.update');
    Route::post('delete/{pirkinys},{user}', [App\Http\Controllers\PirkinysController::class, 'destroy'])->name('pirkinys.destroy');
    Route::get('show/{pirkinys},{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'show'])->name('pirkinys.show');
 });
Route::group(['prefix' => 'categories'], function(){
    Route::get('', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('create/{category}', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('store/{category}', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::post('store_withoutParent/', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store_withoutParent');
    Route::get('edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    // Route::get('delete/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'destroy'])->name('apsipirkimas.destroy');
    // Route::get('show/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'show'])->name('apsipirkimas.show');
 });
Route::group(['prefix' => 'roles'], function(){
    Route::get  ('/',               [RoleController::class, 'index'])->name('role.index');
    Route::get  ('/create',         [RoleController::class, 'create'])->name('role.create');
    Route::post ('/store',          [RoleController::class, 'store'])->name('role.store');
    Route::get  ('/edit/{id}',      [RoleController::class, 'edit'])->name('role.edit');
    Route::post ('/update/{id}',    [RoleController::class, 'update'])->name('role.update');
    Route::post ('/destroy/{id}',   [RoleController::class, 'destroy'])->name('role.destroy');
    Route::get  ('/show/{id}',      [RoleController::class, 'show'])->name('role.show');    
});
Route::group(['prefix' => 'permissions'], function(){
    Route::get  ('/',               [PermissionController::class, 'index'])->name('permission.index');
    Route::get  ('/create',         [PermissionController::class, 'create'])->name('permission.create');
    Route::post ('/store',          [PermissionController::class, 'store'])->name('permission.store');
    Route::get  ('/edit/{id}',      [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post ('/update/{id}',    [PermissionController::class, 'update'])->name('permission.update');
    Route::post ('/destroy/{id}',   [PermissionController::class, 'destroy'])->name('permission.destroy');
    Route::get  ('/show/{id}',      [PermissionController::class, 'show'])->name('permission.show');
}); 
Route::group(['prefix' => 'vendors'], function(){
    Route::get('', [App\Http\Controllers\VendorController::class, 'index'])->name('vendor.index');
    // 
    Route::post('store/', [App\Http\Controllers\VendorController::class, 'store'])->name('vendor.store'); 
    // 
    Route::post('update/{vendor}', [App\Http\Controllers\VendorController::class, 'update'])->name('vendor.update');  
    Route::post('delete/{vendor}', [App\Http\Controllers\VendorController::class, 'destroy'])->name('vendor.destroy');
    // 
}); 
Route::group(['prefix' => 'flats'], function(){
    
});
Route::group(['prefix' => 'buildings'], function(){
    
});
Route::group(['prefix' => 'streets'], function(){
    
});
Route::group(['prefix' => 'setlements'], function(){
    
});
Route::group(['prefix' => 'countries'], function(){
    
});     