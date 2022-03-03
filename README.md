# Laravel Pesa Example

Tested in php 8.x and Laravel Version 9

## Requirements

-   PHP 8.x+
-   Laravel Version 9
-   Composer

## Steps

1. Create a Laravel application or use existing one
   There are several ways to create a Laravel application. For this example we will use the composer command to create a new Laravel application

```sh
composer create-project --prefer-dist laravel/laravel laravel-example
```

Then change directory to the newly created application

```sh
cd laravel-example
```

2. Install `laravel-pesa` package

```sh
composer require openpesa/laravel-pesa
```

3. Publish config files

```sh
php artisan vendor:publish --tag=pesa-config --force
```

4. Add/Update `.env` variables as per your environment

You will get the public key and secret key from the M-Pesa Dashboard

You can find the `.env` file in the `config` directory of your Laravel application

The `.env` file should contain the following variables:

The public keys will be in the documentation while the secret keys will be in the Application Settings on the M-Pesa Postal

```ini
PESA_PUBLIC_KEY=you will get this from the M-Pesa Portal Documentation
PESA_API_KEY=
PESA_ENV=sandbox
```

5. Adding the logic

For simplicity, we have added a simple example API route in the file `routes/api.php`

This package comes with a `Pesa` facade. You can use it to make transactions.

```php
// add the following line to the `routes/api.php` file
use Openpesa\Pesa\Facades\Pesa;
```

```php
// This route will be mapped to  =>  `your-URL/api/charge`
Route::get('/charge', function () {
    $response =  Pesa::c2b([
        'input_Amount' => 5000, // Amount to be charged
        'input_Country' => 'TZN',
        'input_Currency' => 'TZS',
        'input_CustomerMSISDN' => '000000000001', // replace with your phone number
        'input_ServiceProviderCode' => '000000', // replace with your service provider code given by M-Pesa
        'input_ThirdPartyConversationID' => 'rasderekf', // unique
        'input_TransactionReference' => 'asdodfdferre', // unique
        'input_PurchasedItemsDesc' => 'Test  Item'
    ]);


    return $response;
});
```

4. Start the development server

```sh
php artisan serve
```

5. Access and test the API route

```sh
curl -X GET http://localhost:8000/api/charge
```

response:

```json
{
    "output_ResponseCode": "INS-0",
    "output_ResponseDesc": "Request processed successfully",
    "output_TransactionID": "rQTfMMrPDRdj",
    "output_ConversationID": "4e77dadd00b94b1985ee73839f4a23b4",
    "output_ThirdPartyConversationID": "rerekf"
}
```
