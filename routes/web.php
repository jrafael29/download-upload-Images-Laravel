<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('index');

Route::get('/{id}/download', [App\Http\Controllers\Arquivo\DownloadController::class, 'index'])->name('download');

Route::prefix('/painel')->group(function(){

    Route::controller(App\Http\Controllers\Usuario\LoginController::class)->group(function(){
        Route::get('/login', 'index')->middleware('guest')->name('login');
        Route::post('/logint', 'fazerLogin')->name('fazerLogin');
    
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/logout', 'logout')->name('logout');

    });

    Route::controller(App\Http\Controllers\Usuario\RegistroController::class)->group(function(){
        Route::get('/registro', 'registro')->middleware('guest')->name('registro');
        Route::post('/registro', 'salvarRegistro')->name('salvarRegistro');
    });
    
});


Route::prefix('/perfil')->group(function(){
    
    Route::post('/upload', [App\Http\Controllers\Arquivo\UploadController::class, 'index'])->middleware('auth')->name('upload');

    Route::controller(App\Http\Controllers\Arquivo\ImageController::class)->group(function(){
        Route::delete('/{id}/destroyImage', 'destroy')->name('destroyImage');
    });

    Route::controller(App\Http\Controllers\Usuario\PerfilController::class)->group(function(){
        Route::get('/', 'meuPerfil')->middleware('auth')->name('home');

        Route::get('/{id}/images', 'perfilTerceiros')->name('perfilTerceiros');
    });

});


Route::resource('/admin/usuarios', App\Http\Controllers\Admin\UsuarioController::class);
