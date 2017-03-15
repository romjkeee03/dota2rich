<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Unitpay\UnitPay;
use App\Services\Unitpay\UnitPayEvent;

class DonateController extends Controller
{
    public function unitpayDonate(Request $request)
    {
        $payment = new UnitPay(
            new UnitPayEvent(),
            $request
        );
        return $payment->getResult();
    }
}
