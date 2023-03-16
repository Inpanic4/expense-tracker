<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileAccessController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





    // Index expenses
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.index');

    // Create an expense  
    // This route is usable only by an employee
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expense.create')->middleware('employee');

    // Add a new expense
    // Protect this route to be usable only by employee 
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expense.store')->middleware('employee');

    // Show an expense
    Route::get('/expenses/{expense}', [ExpenseController::class, 'show'])->name('expense.show');
    // Protect this route to be usable only by employee that has it
    Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('expense.edit')->middleware('employee');
    // Protect this route to be usable only by employee that has it
    Route::patch('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expense.update')->middleware('employee');



    Route::get('/{expense}/private/{filename}', [FileAccessController::class, 'getFile']);
});

require __DIR__ . '/auth.php';
