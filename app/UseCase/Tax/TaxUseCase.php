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
        return $this->taxRepository->averageAmountOfTaxesPerState($stateId);
    }

    public function averageCountryTaxRatePerState($stateId): float
    {
        return $this->taxRepository->averageCountryTaxRatePerState($stateId);
    }

    public function averageTaxRateOfTheCountry($countryId): float
    {
        return $this->taxRepository->averageTaxRateOfTheCountry($countryId);
    }

    public function overallTaxesOfTheCountry($countryId): float
    {
        return $this->taxRepository->overallTaxesOfTheCountry($countryId);
    }
}
