<?php


namespace App\UseCase\Tax;


interface TaxUseCaseInterface
{
    public function overallAmountOfTaxesPerState($stateId): float;

    public function averageAmountOfTaxesPerState($stateId): float;

    public function averageCountryTaxRatePerState($stateId): float;

    public function averageTaxRateOfTheCountry($countryId): float;

    public function overallTaxesOfTheCountry($countryId): float;
}
