<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\FriendshipRequestController;
use App\Http\Controllers\PakvietimasController;

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
    return view('home');
    if(auth()->user() == null){
        return view('welcome');
    }else{
        return view('user.show', ['user' => auth()->user()]);
    }

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'users'], function(){
    Route::get('',                  [UserController::class, 'index'])->name('user.index')->middleware('auth');
    Route::get('create',            [UserController::class, 'create'])->name('user.create')->middleware('auth');
    Route::post('store',            [UserController::class, 'store'])->name('user.store')->middleware('auth');
    Route::get('edit/{user}',       [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
    Route::post('update/{user}',    [UserController::class, 'update'])->name('user.update')->middleware('auth');
    Route::get('delete/{user}',     [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
    Route::get('show/{user}',       [UserController::class, 'show'])->name('user.show')->middleware('auth');
});

Route::group(['prefix' => 'budgets'], function(){
    Route::get('', [App\Http\Controllers\BudgetController::class, 'index'])->name('budget.index')->middleware('auth');
    Route::get('create/{user}', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create')->middleware('auth');
    Route::post('store/{user}', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store')->middleware('auth');
    Route::get('edit/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'edit'])->name('budget.edit')->middleware('auth');
    Route::post('update/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'update'])->name('budget.update')->middleware('auth');
    Route::get('delete/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy')->middleware('auth');
    Route::get('show/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'show'])->name('budget.show')->middleware('auth');
  });
Route::group(['prefix' => 'apsipirkimai'], function(){
    Route::get('', [App\Http\Controllers\ApsipirkimasController::class, 'index'])->name('apsipirkimas.index')->middleware('auth');
    Route::get('create/{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'create'])->name('apsipirkimas.create')->middleware('auth');
    Route::post('store/{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'store'])->name('apsipirkimas.store')->middleware('auth');
    Route::get('edit/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'edit'])->name('apsipirkimas.edit')->middleware('auth');
    Route::post('update/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'update'])->name('apsipirkimas.update')->middleware('auth');
    Route::get('delete/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'destroy'])->name('apsipirkimas.destroy')->middleware('auth');
    Route::get('show/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'show'])->name('apsipirkimas.show')->middleware('auth');
 });
Route::group(['prefix' => 'pirkiniai'], function(){
    Route::get('', [App\Http\Controllers\PirkinysController::class, 'index'])->name('pirkinys.index')->middleware('auth');
    Route::get('create/{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'create'])->name('pirkinys.create')->middleware('auth');
    Route::post('store/{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'store'])->name('pirkinys.store')->middleware('auth');
    Route::get('edit/{pirkinys},{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'edit'])->name('pirkinys.edit')->middleware('auth');
    Route::post('update/{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'update'])->name('pirkinys.update')->middleware('auth');
    Route::post('delete/{pirkinys},{user}', [App\Http\Controllers\PirkinysController::class, 'destroy'])->name('pirkinys.destroy')->middleware('auth');
    Route::get('show/{pirkinys},{apsipirkimas},{budget},{user}', [App\Http\Controllers\PirkinysController::class, 'show'])->name('pirkinys.show')->middleware('auth');
 });
Route::group(['prefix' => 'categories'], function(){
    Route::get('', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index')->middleware('auth');
    Route::get('create/{category}', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create')->middleware('auth');
    Route::post('store/{category}', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store')->middleware('auth');
    Route::post('store_withoutParent/', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store_withoutParent')->middleware('auth');
    Route::get('edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
    Route::post('update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update')->middleware('auth');
    // Route::get('delete/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'destroy'])->name('apsipirkimas.destroy');
    // Route::get('show/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'show'])->name('apsipirkimas.show');
 });
Route::group(['prefix' => 'roles'], function(){
    Route::get  ('/',               [RoleController::class, 'index'])->name('role.index')->middleware('auth');
    Route::get  ('/create',         [RoleController::class, 'create'])->name('role.create')->middleware('auth');
    Route::post ('/store',          [RoleController::class, 'store'])->name('role.store')->middleware('auth');
    Route::get  ('/edit/{id}',      [RoleController::class, 'edit'])->name('role.edit')->middleware('auth');
    Route::post ('/update/{id}',    [RoleController::class, 'update'])->name('role.update')->middleware('auth');
    Route::post ('/destroy/{id}',   [RoleController::class, 'destroy'])->name('role.destroy')->middleware('auth');
    Route::get  ('/show/{id}',      [RoleController::class, 'show'])->name('role.show')->middleware('auth');   
});
Route::group(['prefix' => 'permissions'], function(){
    Route::get  ('/',               [PermissionController::class, 'index'])->name('permission.index')->middleware('auth');
    Route::get  ('/create',         [PermissionController::class, 'create'])->name('permission.create')->middleware('auth');
    Route::post ('/store',          [PermissionController::class, 'store'])->name('permission.store')->middleware('auth');
    Route::get  ('/edit/{id}',      [PermissionController::class, 'edit'])->name('permission.edit')->middleware('auth');
    Route::post ('/update/{id}',    [PermissionController::class, 'update'])->name('permission.update')->middleware('auth');
    Route::post ('/destroy/{id}',   [PermissionController::class, 'destroy'])->name('permission.destroy')->middleware('auth');
    Route::get  ('/show/{id}',      [PermissionController::class, 'show'])->name('permission.show')->middleware('auth');
}); 
Route::group(['prefix' => 'vendors'], function(){
    Route::get('', [App\Http\Controllers\VendorController::class, 'index'])->name('vendor.index')->middleware('auth');
    // 
    Route::post('store/', [App\Http\Controllers\VendorController::class, 'store'])->name('vendor.store')->middleware('auth'); 
    // 
    Route::post('update/{vendor}', [App\Http\Controllers\VendorController::class, 'update'])->name('vendor.update')->middleware('auth');  
    Route::post('delete/{vendor}', [App\Http\Controllers\VendorController::class, 'destroy'])->name('vendor.destroy')->middleware('auth');
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
Route::group(['prefix' => 'friendships'], function(){
    Route::post ('/destroy/{friendship}', [FriendshipController::class, 'destroy'])->name('friendship.destroy')->middleware('auth');
    Route::post ('/store',                [FriendshipController::class, 'store'])->name('friendship.store')->middleware('auth');  
});
Route::group(['prefix' => 'friendshiprequests'], function(){
    Route::get  ('/',                               [FriendshipRequestController::class, 'index'])->name('friendshiprequest.index')->middleware('auth');
    Route::post ('/store',                          [FriendshipRequestController::class, 'store'])->name('friendshiprequest.store')->middleware('auth');
    Route::post ('/destroy/{friendshiprequest}',    [FriendshipRequestController::class, 'destroy'])->name('friendshiprequest.destroy')->middleware('auth');
    Route::get  ('/show/{user}',                    [FriendshipRequestController::class, 'show'])->name('friendshiprequest.show')->middleware('auth');    
});
Route::group(['prefix' => 'pakvietimai'],function(){
    Route::get  ('/{user}',                 [PakvietimasController::class, 'index'  ])->name('pakvietimas.index'    )->middleware('auth');
    Route::post ('/destroy/{pakvietimas}',  [PakvietimasController::class, 'destroy'])->name('pakvietimas.destroy'  )->middleware('auth');
    Route::post ('/store',                  [PakvietimasController::class, 'store'])->name('pakvietimas.store')->middleware('auth');
});
?>