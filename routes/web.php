<?php

use App\Models\animals;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Client;

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

Route::post('/save_client', function (Request $req) {
    Client::create([
        'name' => $req->name,
        'age' => $req->age,
        'address' => $req->address,
        'phone' => $req->phone,
    ]);
    return back();
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('welcome', ['clients' => Client::all()]);
});

Route::get('/delete_car/{id}', function ($id) {
    Client::where('id', '=', $id)->first()->delete();
    return back()->with('success', 'Client Deleted successfully');
});

Route::get('/animals', function () {
    return view('animals');
});
Route::get('/animals', function () {
    return view('animals', ['animals' => animals::all()]);
});

Route::post('save_animals', function (Request $req) {
    Animals::create([
        'name' => $req->name,
        'type' => $req->type,
        'color' => $req->color,
    ]);
    return back();
});


