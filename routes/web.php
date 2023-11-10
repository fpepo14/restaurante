<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\IncomeController;

Auth::routes();
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Tables
    Route::get('/mesas', [TableController::class, 'index'])->name('indexTables');
    Route::post('/mesas', [TableController::class, 'store'])->name('createTable');
    Route::get('/vermesa/{id}', [TableController::class, 'show'])->name('showTable');
    Route::put('/editar/mesa/{id}', [TableController::class, 'update'])->name('updateTable');
    Route::delete('/eliminar/mes/{id}', [TableController::class, 'destroy'])->name('deleteTable');

    //Restaurants
    Route::get('/restaurantes', [RestaurantController::class, 'index'])->name('indexRestaurants');
    Route::post('/restaurantes', [RestaurantController::class, 'store'])->name('createRestaurant');
    Route::get('/ver/restaurante/{id}', [RestaurantController::class, 'show'])->name('showRestaurant');
    Route::put('/editar/restaurante/{id}', [RestaurantController::class, 'update'])->name('updateRestaurant');
    Route::delete('/eliminar/restaurante/{id}', [RestaurantController::class, 'destroy'])->name('deleteRestaurant');

    //Products

    Route::get('/productos', [ProductController::class, 'index'])->name('indexProducts');
    Route::post('/productos', [ProductController::class, 'store'])->name('createProduct');
    Route::put('/editar/producto/{id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::delete('/eliminar/producto/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');

    //Users
    Route::get('/usuarios', [UserController::class, 'index'])->name('indexUsers');

    //Categories
    Route::get('/categorias', [CategoryController::class, 'index'])->name('indexCategories');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('createCategory');
    Route::put('/editar/categoria/{id}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::delete('/eliminar/categoria/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');

    //Orders
    Route::get('/ordenes', [OrderController::class, 'index'])->name('indexOrders');
    Route::get('/ver/orden/{id}', [OrderController::class, 'detail'])->name('detailOrder');
    Route::post('/ver/orden/{id}/cambiar/estado', [OrderController::class, 'changeStatus'])->name('changeOrderStatus');
    
    //Reports
    Route::get('/reportes', [ReportController::class, 'index'])->name('indexReports');
    Route::post('/ordenes/por/restaurante', [ReportController::class, 'ordersForRestaurant'])->name('ordersForRestaurant');

    //Spendings
    Route::get('/gastos', [SpendingController::class, 'index'])->name('indexSpendings');
    Route::post('/gastos', [SpendingController::class, 'store'])->name('createSpending');
    Route::put('/editar/gasto/{id}', [SpendingController::class, 'update'])->name('updateSpending');
    Route::delete('/eliminar/gasto/{id}', [SpendingController::class, 'destroy'])->name('deleteSpending');

    //PaymentMethods
    Route::get('/medios-de-pago', [PaymentMethodController::class, 'index'])->name('indexPaymentMethods');
    Route::post('/medios-de-pago', [PaymentMethodController::class, 'store'])->name('createPaymentMethod');
    Route::put('/editar/medio-de-pago/{id}', [PaymentMethodController::class, 'update'])->name('updatePaymentMethod');
    Route::delete('/eliminar/medio-de-pago/{id}', [PaymentMethodController::class, 'destroy'])->name('deletePaymentMethod');

    //Incomes
    Route::get('/ingresos', [IncomeController::class, 'index'])->name('indexIncomes');
    Route::post('/ingresos', [IncomeController::class, 'store'])->name('createIncome');
    Route::put('/editar/ingreso/{id}', [IncomeController::class, 'update'])->name('updateIncome');
    Route::delete('/eliminar/ingreso/{id}', [IncomeController::class, 'destroy'])->name('deleteIncome');

//Front
Route::get('/', function(){
    return view('front.welcome');
});
Route::get('/home', [FrontController::class, 'index'])->name('home');
Route::get('/atender/mesa/{id}', [FrontController::class, 'attendTable'])->name('attendTable');
Route::get('/atender/mesa/{tableid}/crear/orden', [OrderController::class, 'store'])->name('createOrder');
Route::get('/orden/{id}', [OrderController::class, 'show'])->name('showOrder');
Route::post('/orden/{id}/agregar/producto', [OrderController::class, 'addProduct'])->name('addProduct');
Route::get('/orden/{id}/quitar/producto/{relId}', [OrderController::class, 'removeProduct'])->name('removeProduct');
Route::get('/orden/{id}/entregar', [OrderController::class, 'deliver'])->name('deliverOrder');
Route::get('/orden/{id}/solicitar', [OrderController::class, 'requested'])->name('requestedOrder');
Route::get('/orden/{id}/preparar', [OrderController::class, 'prepared'])->name('preparedOrder');
Route::get('/orden/{id}/cerrar', [OrderController::class, 'close'])->name('closeOrder');
Route::get('/cocina', [FrontController::class, 'kitchen'])->name('kitchenIndex');
Route::get('/cocina/ingresos', [FrontController::class, 'incomes'])->name('incomes');
Route::get('/cocina/gastos', [FrontController::class, 'spendings'])->name('spendings');
Route::get('/cocina/stock', [FrontController::class, 'stock'])->name('stock');
Route::get('/cocina/reporte', [ReportController::class, 'reportForm'])->name('reportForm');
Route::post('/cocina/reporte/', [ReportController::class, 'reportForDay'])->name('reportForDay');
Route::post('/orden/{id}/cobrar', [OrderController::class, 'chargeOrder'])->name('chargeOrder');





