<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');

Route::middleware('auth')->group(function () {
	Route::get('/', function () {
		return Inertia::render('Home', [
			//'username' => 'Yosri Gam',
		]);
	});

	Route::get('/users/create', function () {

		return Inertia::render('Users/Create');
	})->middleware('can:create,App\Models\User');

	Route::post('/users', function () {
		$validated = Request::validate([
			'name' => 'required',
			'email' => ['required', 'email'],
			'password' => 'required',
		]);
		User::create($validated);
		return redirect('/users');
	});

	Route::get('/users/{id}/edit', function () {
		return Inertia::render('Users/Edit', [
			'user' => User::find(\request()->route('id')),
			'can' => ['editUser' => Auth::user()->can('edit', User::class)],
		]);
	});

	Route::put('/users', function () {

		$user = User::find([\request()->input('id')])->first();
		$user->name = \request()->input('name');
		$user->email = \request()->input('email');
		$user->save();
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
			'filters' => Request::only('search'),
			'can' => [
				'createUser' => Auth::user()->can('create', User::class),
				'editUser' => Auth::user()->can('update', [Auth::user(), User::class])],
		],
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
		Auth::logout();
	});
});

