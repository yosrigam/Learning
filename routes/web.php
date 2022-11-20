<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
	return Inertia::render('Home', [
		//'username' => 'Yosri Gam',
	]);
});

Route::get('/users/create', function () {
	return Inertia::render('Users/Create');
});

Route::post('/users', function () {
	User::create(Request::all());
	return redirect('/users');

});

Route::get('/users/{id}/edit', function () {

	return Inertia::render('Users/Create', [
		'user' => User::find(\request()->route('id')),
	]);

});

Route::get('/users', function () {
	return Inertia::render('Users/Index', [
		'users' => User::when(Request::input('search'), function ($query, $search) {
			$query->where('name', 'like', "%{$search}%");
		})->paginate(10)
			->withQueryString()
			->through(fn($user) => [
				'id' => $user->id,
				'name' => $user->name,
			]),
		'filters' => Request::only('search')],
	);
	/*return Inertia::render('Users', [
		'users' => User::paginate(10)->map(fn($user) => [
			'name' => $user->name,
		]),
	]);*/
});

Route::get('/settings', function () {

	return Inertia::render('Settings', [
	]);
});

Route::post('/logout', function () {
	dd('user logged out', request()->get('foo'));
});

