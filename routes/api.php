<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Openpesa\Pesa\Facades\Pesa;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// This route will be=> api/charge
Route::get('/charge', function () {
    $response =  Pesa::c2b([
        'input_Amount' => 5000, // Amount to be charged
        'input_Country' => 'TZN',
        'input_Currency' => 'TZS',
        'input_CustomerMSISDN' => '000000000001', // replace with your phone number
        'input_ServiceProviderCode' => '000000', // replace with your service provider code given by M-Pesa
        'input_ThirdPartyConversationID' => 'rerekf', // unique
        'input_TransactionReference' => 'odfdferre', // unique
        'input_PurchasedItemsDesc' => 'Test Two Item'
    ]);


    return $response;
});
