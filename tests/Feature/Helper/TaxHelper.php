<?php

namespace Tests\Feature\Helper;

use App\Models\County;
use App\Models\CountyIncome;
use App\Models\State;

trait TaxHelper
{
    protected $countTaxRate1;
    protected $countTaxRate2;
    protected $countTaxRate3;
    protected $countAmount1;
    protected $countAmount2;
    protected $countAmount3;
    protected $states;

    protected function initializeData()
    {
        $this->countTaxRate1 = 0.12;
        $this->countTaxRate2 = 0.4;
        $this->countTaxRate3 = 0.6;
        $this->countAmount1 = 80000;
        $this->countAmount2 = 690000;
        $this->countAmount3 = 455000;
        $this->states = State::factory(5)
            ->has(County::factory()
                ->state([
                    'tax_rate' => $this->countTaxRate1
                ])
                ->has(CountyIncome::factory()
                    ->state([
                        'amount' => $this->countAmount1
                    ])
                )
            )
            ->has(County::factory()
                ->state([
                    'tax_rate' => $this->countTaxRate2
                ])
                ->has(CountyIncome::factory()
                    ->state([
                        'amount' => $this->countAmount2
                    ])
                )
            )
            ->has(County::factory()
                ->state([
                    'tax_rate' => $this->countTaxRate3
                ])
                ->has(CountyIncome::factory()
                    ->state([
                        'amount' => $this->countAmount3
                    ])
                )
            )
            ->create();
    }

}
