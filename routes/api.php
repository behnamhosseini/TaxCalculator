<?php

use App\Http\Controllers\Api\TaxCalculatorController;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('sd',function(){
    return State::all();
});
Route::prefix('tax')->name('tax.')->group(function () {
    Route::get('overallAmountOfTaxesPerState/{state}',[TaxCalculatorController::class,'overallAmountOfTaxesPerState'])->name('overallAmountOfTaxesPerState');
    Route::get('averageAmountOfTaxesPerState/{state}',[TaxCalculatorController::class,'averageAmountOfTaxesPerState'])->name('averageAmountOfTaxesPerState');
    Route::get('averageCountryTaxRatePerState/{state}',[TaxCalculatorController::class,'averageCountryTaxRatePerState'])->name('averageCountryTaxRatePerState');
    Route::get('overallTaxesOfTheCountry/{country}',[TaxCalculatorController::class,'overallTaxesOfTheCountry'])->name('overallTaxesOfTheCountry');
    Route::get('averageTaxRateOfTheCountry/{country}',[TaxCalculatorController::class,'averageTaxRateOfTheCountry'])->name('averageTaxRateOfTheCountry');
});
