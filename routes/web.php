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

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Auth::routes(['verify' => true]);


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.index');
        Route::get('/edit/{user}', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.users.update');
        Route::delete('/{user}', [App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('admin.users.destroy');
    });
    
});

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    


    Route::group(['prefix' => 'companies'], function(){
        Route::get('/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
        Route::post('/',[App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
        Route::get('/edit/{company}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
        Route::put('/{company}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
        Route::delete('/{company}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');
        Route::get('/change', [App\Http\Controllers\CompanyController::class, 'change'])->name('company.change');
        Route::post('/change', [App\Http\Controllers\CompanyController::class, 'changeCompany'])->name('company.changeCompany');
    });

    Route::group(['middleware' => 'ensureCompany'], function(){
        Route::group(['prefix' => 'directions'], function(){
            Route::get('/create', [App\Http\Controllers\DirectionController::class, 'create'])->name('direction.create');
            Route::post('/', [App\Http\Controllers\DirectionController::class, 'store'])->name('direction.store');
            Route::get('/edit/{direction}', [App\Http\Controllers\DirectionController::class, 'edit'])->name('direction.edit');
            Route::put('/{direction}', [App\Http\Controllers\DirectionController::class, 'update'])->name('direction.update');
            Route::delete('/{direction}', [App\Http\Controllers\DirectionController::class, 'destroy'])->name('direction.destroy');

            Route::post('/search', [App\Http\Controllers\DirectionController::class, 'showDirections'])->name('directions.search');
            
            Route::get('/download/{direction}', [App\Http\Controllers\DirectionController::class, 'downloadDirection'])->name('direction.download');

            Route::get('/export/{company}', [App\Http\Controllers\DirectionController::class, 'showExport'])->name('direction.show_export');

            Route::post('/export/{company}', [App\Http\Controllers\DirectionController::class, 'export'])->name('direction.export');
        
            Route::post('/loadfactors', [App\Http\Controllers\DirectionController::class, 'loadfactors'])->name('direction.loadfactors');
            Route::post('/loadHarmfulFactors', [App\Http\Controllers\DirectionController::class, 'loadHarmfulFactors'])->name('direction.loadHarmfulFactors');
        });

        /* 
            SETTINGS
        */
        Route::group(['prefix' => 'settings'], function(){
            Route::get('/', [App\Http\Controllers\SettingController::class, 'index'])->name('settings');



            Route::group(['prefix' => 'harmful'], function(){
                Route::get('/', [App\Http\Controllers\HarmfulController::class, 'index'])->name('harmfulfactors.index');
                Route::delete('/{factor}', [App\Http\Controllers\HarmfulController::class, 'destroy'])->name('harmful.destroy');
                Route::post('/harmful', [App\Http\Controllers\HarmfulController::class, 'save'])->name('harmful.save');

               Route::group(['prefix' => 'action'], function(){
                Route::post('/import', [App\Http\Controllers\HarmfulController::class, 'import'])->name('harmfulfactors.import');
                Route::delete('/delete/{company}', [App\Http\Controllers\HarmfulController::class, 'deleteAll'])->name('harmfulfactors.delete.all');
               });

            });
        });
        
        
    });



});

Route::any('/404', function(){
    return response()->view('errors.404', [], 404);
})->name('fallback');