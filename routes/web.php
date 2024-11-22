<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PioltController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissonController;
use App\Http\Controllers\AsignPermissonController;
use App\Http\Controllers\GovernateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\TransactionController;

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

;

//! 001 => Auth Routes
Route::get("login",[AuthController::class,"index"])->name("login");
Route::post("login",[AuthController::class,"login"])->name("loginPost");

Route::middleware(["auth:sanctum","admin"])->group(function (){

Route::prefix("admin")->group(function (){
//! 002 => General Dashboard Route
Route::get("dashboard", [DashboardController::class,"index"])->name("dashboard");
//! 003 => Users Routes
Route::prefix('users')->group(function(){

        Route::resource('users' , UserController::class);
        Route::resource('pilots', PioltController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('owners', OwnerController::class);
    });

//! 004 => Roles Routes
Route::prefix('roles')->group(function(){


        Route::get('/' , [RoleController::class,'index'])->name('roles.index');
        Route::post('userList/{role}' , [RoleController::class,'userlist'])->name('roles.show');
        Route::get('create' , [RoleController::class,'create'])->name('roles.create');
        Route::post('store' , [RoleController::class,'store'])->name('roles.store');
        Route::delete('{id}' , [RoleController::class,'destroy'])->name('roles.destroy');
        Route::get('{role}/edit' , [RoleController::class,'edit'])->name('roles.edit');
        Route::Put('{role}' , [RoleController::class,'update'])->name('roles.update');
        Route::get('assign' , [AsignPermissonController::class ,'assignPage'])->name('roles.assign');
        Route::post('assign' , [AsignPermissonController::class ,'rolePermisson'])->name('roles.assign.store');
    });

//! 005 => Permissons Routes
Route::prefix('permissons')->group(function(){
        Route::get('/' , [PermissonController::class ,'index'])->name('permissons.index');
        Route::get('/create' , [PermissonController::class ,'create'])->name('permissons.create');
        Route::post('/store' , [PermissonController::class ,'store'])->name('permissons.store');
        Route::get('/edit/{permisson}' , [PermissonController::class ,'edit'])->name('permissons.edit');
        Route::put('/update/{permisson}' , [PermissonController::class ,'update'])->name('permissons.update');
        Route::delete('/delete/{permisson}' , [PermissonController::class ,'destroy'])->name('permissons.destroy');
        Route::get('/show/{permisson}' , [PermissonController::class ,'show'])->name('permissons.show');

});

//! 006 => Regions Routes
Route::prefix('regions')->group(function(){
        Route::resource('governate' ,GovernateController::class );
        Route::resource('cities' ,CityController::class );

});


//! 008 => Hubs Route
Route::prefix('hubs')->group(function(){
    Route::resource('hubs' , HubController::class);
});
//! 007 => Pickups Route
Route::prefix('pickups')->group(function(){
    Route::resource('pickups' ,PickupController::class );
});
//! 008 => Transcations Route
Route::prefix('transctions')->group(function(){
    Route::resource('moneny' , TransactionController::class);

});

//! 009 => Shipments Route
Route::prefix('shipments')->group(function(){
    Route::get('/' , [ShipmentController::class,'index'])->name('shipments.index');
    Route::get('create' , [ShipmentController::class,'create'])->name('shipments.create');
    Route::get('/create_details' , [ShipmentController::class,'createShipments'])->name('shipments.createShipments');
    Route::post('/client' , [ShipmentController::class,'store'])->name('shipments.store');
    Route::post('/create_details' , [ShipmentController::class,'storeShipments'])->name('shipments.createShipments');
    Route::post('/create_location' , [ShipmentController::class,'createShimpentsLocations'])->name('shipments.createShipmentsL');
});

});
});
