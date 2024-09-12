<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("")->group(function () {
  Route::get("/users", [UserController::class, 'index']);
  Route::get("/users/{user}", [UserController::class, 'show']);
  Route::get("/expenses", [ExpenseController::class, 'index']);
  Route::get("/expenses/{user}", [ExpenseController::class, 'show']);
  Route::post("/expenses", [ExpenseController::class, 'store']);
});