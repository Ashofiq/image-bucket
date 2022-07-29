<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Uploader\UploaderController;
use App\Http\Controllers\Response\ResponseController;

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

Route::Post('/uploader', [UploaderController::class,'uploader'])->middleware('ImageGuard', 'Cors');
Route::Get('p/{imageType}/{name}', [ResponseController::class,'response']);


