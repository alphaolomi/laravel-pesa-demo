<?php

namespace App\Http\Controllers;

use Openpesa\Pesa\PesaFacade;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function pay()
    {
        $data_c2b = [
            'input_Amount' => 2033,
            'input_Country' => 'TZN',
            'input_Currency' => 'TZS',
            'input_CustomerMSISDN' => '000000000001',
            'input_ServiceProviderCode' => '000000',
            'input_ThirdPartyConversationID' => 'rrekf',
            'input_TransactionReference' => 'odfdherre',
            'input_PurchasedItemsDesc' => 'Test Two 2 Item'
        ];
        $res = PesaFacade::c2b($data_c2b);
        dd($res);
        return $res;
    }
}
