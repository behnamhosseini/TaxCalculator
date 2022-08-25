<?php


namespace App\Repository\Tax;


use App\Models\County;
use App\Models\CountyIncome;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class TaxPostgresqlRepository implements TaxRepositoryInterface
{

    public function overallAmountOfTaxesPerState($stateId): float
    {
        return County::whereStateId($stateId)
            ->from( 'counties as c' )
            ->join('county_incomes as ci','c.id','=','ci.county_id')
            ->select(DB::raw('sum(c.tax_rate * ci.amount) as sum'))
            ->groupByRaw('c.state_id')
            ->first()
            ->sum;
    }

    public function averageAmountOfTaxesPerState($stateId): float
    {
        return County::whereStateId($stateId)
            ->from( 'counties as c' )->join('county_incomes as ci','c.id','=','ci.county_id')
            ->select(DB::raw('avg(c.tax_rate * ci.amount) as avg'))
            ->groupByRaw('c.state_id')
            ->first()
            ->avg;
    }

    public function averageCountryTaxRatePerState($stateId): float
    {
        return County::whereStateId($stateId)->avg('tax_rate');
    }

    public function averageTaxRateOfTheCountry($countryId): float
    {
        return State::whereCountryId($countryId)
            ->from( 'states as s' )
            ->join('counties as c','c.state_id','=','s.id')
            ->select(DB::raw('avg(c.tax_rate) as avg'))
            ->groupByRaw('c.state_id')
            ->first()
            ->avg;
    }

    public function overallTaxesOfTheCountry($countryId): float
    {
        return State::whereCountryId($countryId)->from( 'states as s' )
            ->join('counties as c','c.state_id','=','s.id')
            ->join('county_incomes as ci','c.id','=','ci.county_id')
            ->select(DB::raw('sum(ci.amount * c.tax_rate) as sum'))
            ->groupByRaw('s.country_id')
            ->first()
            ->sum;
    }
}
