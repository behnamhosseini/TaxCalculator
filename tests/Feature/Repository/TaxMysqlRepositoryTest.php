<?php

namespace Tests\Feature\Repository;

use App\Models\County;
use App\Models\CountyIncome;
use App\Models\State;
use App\Repository\Tax\TaxMysqlRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaxMysqlRepositoryTest extends TestCase
{


    public function testOverallAmountOfTaxesPerState()
    {
        //arrange
        $count1TaxRate=0.1;
        $count2TaxRate=0.2;
        $count1Amount=80000;
        $count2Amount=690000;
        $state=State::factory()
            ->has(County::factory()
                ->state([
                    'tax_rate'=>$count1TaxRate
                ])
                ->has(CountyIncome::factory()
                    ->state([
                        'amount'=>$count1Amount
                    ])
                )
            )
            ->has(County::factory()
                ->state([
                    'tax_rate'=>$count2TaxRate
                ])
                ->has(CountyIncome::factory()
                    ->state([
                        'amount'=>$count2Amount
                    ])
                )
            )
            ->create();

        $expected=($count1Amount * $count1TaxRate) + ($count2Amount * $count2TaxRate);

        //act
        $TaxMysqlRepository=new TaxMysqlRepository();
        $result=$TaxMysqlRepository->overallAmountOfTaxesPerState($state->id);

        //assert

        $this->assertEquals($expected,$result);
    }
}
