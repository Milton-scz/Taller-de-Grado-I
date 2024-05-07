<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\IsAdmin;
use App\Http\Controllers\WelcomePageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\RutaRastreoController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\CallBackAdminController;
use App\Http\Controllers\ConsultarAdminController;

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
Route::get('/', WelcomePageController::class)->name('/');
//si es administrador
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('is.admin')->group(function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // GESTIONAR USUARIOS
        Route::get('/admin-users', [UsersController::class, 'index'])->name('admin.users');
        Route::get('/admin-users/create', [UsersController::class, 'create'])->name('admin.users.create');
        Route::post('/admin-users/register', [UsersController::class, 'store'])->name('admin.users.register');
        Route::get('/admin-users/edit/{user_id}', [UsersController::class, 'edit'])->name('admin.users.edit');
        Route::patch('/admin-users/edit/{user_id}', [UsersController::class, 'update'])->name('admin.users.update');
        Route::delete('admin-users/destroy/{user_id}',  [UsersController::class, 'destroy'])->name('admin.users.delete');



        // GESTIONAR ALMACEN
        Route::get('/admin-almacenes', [AlmacenController::class, 'index'])->name('admin.almacenes');
        Route::get('/admin-almacen/create',[AlmacenController::class, 'create'])->name('admin.almacen.create');
        Route::post('/admin-almacen/store',[AlmacenController::class, 'store'])->name('admin.almacen.store');
        Route::get('/admin-almacen/edit/{almacen_id}',[AlmacenController::class, 'edit'])->name('admin.almacen.edit');
        Route::patch('/admin-almacen/update/{almacen_id}', [AlmacenController::class, 'update'])->name('admin.almacen.update');
        Route::delete('admin-almacen/destroy/{almacen_id}',  [AlmacenController::class, 'destroy'])->name('admin.almacen.destroy');


        //GESTIONAR SERVICIOS
        Route::get('/admin-servicios', [ServicioController::class, 'index'])->name('admin.servicios');
        Route::get('/admin-servicio/create',[ServicioController::class, 'create'])->name('admin.servicio.create');
        Route::post('/admin-servicio/store',[ServicioController::class, 'store'])->name('admin.servicio.store');
        Route::get('/admin-servicio/edit/{servicio_id}',[ServicioController::class, 'edit'])->name('admin.servicio.edit');
        Route::patch('/admin-servicio/update/{servicio_id}', [ServicioController::class, 'update'])->name('admin.servicio.update');
        Route::delete('admin-servicio/destroy/{servicio_id}',  [ServicioController::class, 'destroy'])->name('admin.servicio.destroy');

        //GESTIONAR PAQUETE
        Route::get('/admin-paquetes',[PaqueteController::class, 'index'])->name('admin.paquetes');
        Route::get('/admin-paquete/create',[PaqueteController::class, 'create'])->name('admin.paquete.create');
        Route::post('/admin-paquete/store',[PaqueteController::class, 'store'])->name('admin.paquete.store');
        Route::get('/admin-paquete/edit/{paquete_id}',[PaqueteController::class, 'edit'])->name('admin.paquete.edit');
        Route::patch('/admin-paquete/update/{paquete_id}', [PaqueteController::class, 'update'])->name('admin.paquete.update');
        Route::delete('admin-paquete/destroy/{paquete_id}',  [PaqueteController::class, 'destroy'])->name('admin.paquete.destroy');

         //GESTIONAR GUIA
         Route::get('/admin-guias',[GuiaController::class, 'index'])->name('admin.guias');
         Route::get('/admin-guia/create',[GuiaController::class, 'create'])->name('admin.guia.create');
         Route::post('/admin-guia/store',[GuiaController::class, 'store'])->name('admin.guia.store');
         Route::get('/admin-guia/edit/{guia_id}',[GuiaController::class, 'edit'])->name('admin.guia.edit');
         Route::patch('/admin-guia/update/{guia_id}', [GuiaController::class, 'update'])->name('admin.guia.update');
         Route::delete('admin-guia/destroy/{guia_id}',  [GuiaController::class, 'destroy'])->name('admin.guia.destroy');

         //GESTIONAR RUTA_RASTREO
         Route::get('/admin-rutasrastreos',[RutaRastreoController::class, 'index'])->name('admin.rutasrastreos');
         Route::get('/admin-rutarastreo/create',[RutaRastreoController::class, 'create'])->name('admin.rutarastreo.create');
         Route::post('/admin-rutarastreo/store',[RutaRastreoController::class, 'store'])->name('admin.rutarastreo.store');
         Route::get('/admin-rutarastreo/edit/{rutarastreo_id}',[RutaRastreoController::class, 'edit'])->name('admin.rutarastreo.edit');
         Route::patch('/admin-rutarastreo/update/{rutarastreo_id}', [RutaRastreoController::class, 'update'])->name('admin.rutarastreo.update');
         Route::delete('admin-rutarastreo/destroy/{rutarastreo_id}',  [RutaRastreoController::class, 'destroy'])->name('admin.rutarastreo.destroy');

            // PAGOS WEB

            Route::post('/pagos/generarCobro', [PagosController::class, 'generarCobro'])->name('admin.pagos.generarCobro');
            Route::post('/pagos/callback', CallBackAdminController::class)->name('admin.pagos.callback');
            Route::get('/pagos/consultar/{venta_id}', ConsultarAdminController::class)->name('admin.pagos.consultar');
                    });


    Route::middleware('is.student')->group(function(){
        Route::get('/only-student', function () {
            return 'solo el estudiante puede ver esto';
        });
    });
});


require __DIR__.'/auth.php';