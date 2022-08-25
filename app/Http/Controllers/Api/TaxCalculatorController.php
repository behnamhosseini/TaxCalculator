<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\UseCase\Tax\TaxUseCaseInterface;
use Illuminate\Http\Request;

class TaxCalculatorController extends Controller
{
    public function __construct(TaxUseCaseInterface $taxUseCaseInterface)
    {

    }


}
