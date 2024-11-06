<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\filesController;
use App\Http\Controllers\ControllerCorbeille;


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
Route::get('AddUser', function () {
    return view('AddUser');
});

Route::middleware('auth')->group(function () {

    //home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //folder & files
    Route::POST('/uploadfolder', [UploadController::class, 'uploadFolder']);
    Route::get('/CreateFolder', function () { return view('CreateFolder');});

    //search
    Route::POST('/search', [ArchiveController::class, 'search_header']);


    //files added
    Route::get('/addfile', [filesController::class, 'index']);
    Route::POST('/uploadfile', [filesController::class, 'uploadfile']);



    Route::middleware('role')->group(function () {

        //users
        Route::get('/Users', [UserController::class, 'index'])->name('users');
        Route::get('/deleteuser/{userid}', [UserController::class, 'deleteuser'])->name('deleteuser');

        //corbeille
        Route::get('/corbeille', [ControllerCorbeille::class, 'index']);
        Route::get('/Recovry/{idfile}', [ControllerCorbeille::class, 'Recovry'])->name('Recovry');
        Route::get('/Deletefile/{idfile}', [ControllerCorbeille::class, 'Deletefile'])->name('Deletefile');

        //archive
        Route::get('/archiveshow', [ArchiveController::class, 'index']);
        Route::get('/archiveshow/{parameter}', [ArchiveController::class, 'getfiles'])->name('archiveshow');
        Route::get('/getfile/{codefile}', [ArchiveController::class, 'getfile'])->name('getfile');
        Route::POST('/editfile', [ArchiveController::class, 'updatefile']);
        Route::POST('/deletefile', [ArchiveController::class, 'deletefile']);
    });


});

//Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();