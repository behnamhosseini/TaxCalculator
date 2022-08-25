<?php


namespace App\UseCase\Tax;


use App\Repository\Tax\TaxRepositoryInterface;

class TaxUseCase implements TaxUseCaseInterface
{

    private TaxRepositoryInterface $taxRepository;

    public function __construct(TaxRepositoryInterface $taxRepository)
    {
        $this->taxRepository = $taxRepository;
    }

    public function overallAmountOfTaxesPerState($stateId): float
    {
        return round($this->taxRepository->overallAmountOfTaxesPerState($stateId),2);
    }

    public function averageAmountOfTaxesPerState($stateId): float
    {
        return round($this->taxRepository->averageAmountOfTaxesPerState($stateId),2);
    }

    public function averageCountryTaxRatePerState($stateId): float
    {
        return round($this->taxRepository->averageCountryTaxRatePerState($stateId),2);
    }

    public function averageTaxRateOfTheCountry($countryId): float
    {
        return round($this->taxRepository->averageTaxRateOfTheCountry($countryId),2);
    }

    public function overallTaxesOfTheCountry($countryId): float
    {
        return round($this->taxRepository->overallTaxesOfTheCountry($countryId),2);
    }
}
