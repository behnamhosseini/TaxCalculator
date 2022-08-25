<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\UseCase\Tax\TaxUseCaseInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxCalculatorController extends Controller
{
    private TaxUseCaseInterface $taxUseCase;

    public function __construct(TaxUseCaseInterface $taxUseCase)
    {
        $this->taxUseCase = $taxUseCase;
    }

    public function overallAmountOfTaxesPerState(State $state)
    {
        $result = $this->taxUseCase->overallAmountOfTaxesPerState($state->id);
        return response()->json($result, Response::HTTP_OK);
    }

    public function averageAmountOfTaxesPerState(State $state)
    {
        $result = $this->taxUseCase->averageAmountOfTaxesPerState($state->id);
        return response()->json($result, Response::HTTP_OK);
    }

    public function averageCountryTaxRatePerState(State $state)
    {
        $result = $this->taxUseCase->averageCountryTaxRatePerState($state->id);
        return response()->json($result, Response::HTTP_OK);
    }

    public function averageTaxRateOfTheCountry(Country $country)
    {
        $result = $this->taxUseCase->averageTaxRateOfTheCountry($country->id);
        return response()->json($result, Response::HTTP_OK);
    }

    public function overallTaxesOfTheCountry(Country $country)
    {
        $result = $this->taxUseCase->overallTaxesOfTheCountry($country->id);
        return response()->json($result, Response::HTTP_OK);
    }
}
