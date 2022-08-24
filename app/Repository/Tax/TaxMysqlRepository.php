<?php


namespace App\Repository\Tax;


class TaxMysqlRepository implements TaxRepositoryInterface
{

    public function overallAmountOfTaxesPerState($stateId): float
    {
        // TODO: Implement overallAmountOfTaxesPerState() method.
    }

    public function averageAmountOfTaxesPerState($stateId): float
    {
        // TODO: Implement averageAmountOfTaxesPerState() method.
    }

    public function averageCountryTaxRatePerState($stateId): float
    {
        // TODO: Implement averageCountryTaxRatePerState() method.
    }

    public function averageTaxRateOfTheCountry($countryId): float
    {
        // TODO: Implement averageTaxRateOfTheCountry() method.
    }

    public function overallTaxesOfTheCountry($countryId): float
    {
        // TODO: Implement overallTaxesOfTheCountry() method.
    }
}
