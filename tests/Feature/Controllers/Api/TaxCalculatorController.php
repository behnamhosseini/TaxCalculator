<?php

namespace Tests\Feature\Controllers\Api;

use App\UseCase\Tax\TaxUseCaseInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\Feature\Helper\TaxHelper;
use Tests\TestCase;

class TaxCalculatorController extends TestCase
{
    use TaxHelper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->initializeData();
    }

    public function testOverallAmountOfTaxesPerState()
    {
        //arrange
        $expected = ($this->countAmount1 * $this->countTaxRate1) + ($this->countAmount2 * $this->countTaxRate2) + ($this->countAmount3 * $this->countTaxRate3);
        //act
        $response=$this
            ->withHeaders([
                'HTTP_X-Requested-with'=>'XMLHttpRequest'
            ])
            ->getJson(
                route('tax.overallAmountOfTaxesPerState',$this->states[0]->id),
            )
            ->assertOk();

        //assert
        $this->assertEquals($expected, $response->getContent());
    }
    public function testAverageAmountOfTaxesPerState()
    {
        //arrange
        $expected = (($this->countAmount1 * $this->countTaxRate1) + ($this->countAmount2 * $this->countTaxRate2) + ($this->countAmount3 * $this->countTaxRate3)) / 3;
        //act
        $response=$this
            ->withHeaders([
                'HTTP_X-Requested-with'=>'XMLHttpRequest'
            ])
            ->getJson(
                route('tax.averageAmountOfTaxesPerState',$this->states[0]->id),
            )
            ->assertOk();

        //assert
        $this->assertEquals($expected, $response->getContent());
    }
    public function testAverageCountryTaxRatePerState()
    {
        //arrange
        $expected = round(($this->countTaxRate1 + $this->countTaxRate2 + $this->countTaxRate3) / 3,2);
        //act
        $response=$this
            ->withHeaders([
                'HTTP_X-Requested-with'=>'XMLHttpRequest'
            ])
            ->getJson(
                route('tax.averageCountryTaxRatePerState',$this->states[0]->id),
            )
            ->assertOk();

        //assert
        $this->assertEquals($expected, $response->getContent());
    }
    public function testAverageTaxRateOfTheCountry()
    {
        //arrange
        $expected = round((($this->countTaxRate1 + $this->countTaxRate2 + $this->countTaxRate3) * 5) / (3 * 5),2);
        //act
        $response=$this
            ->withHeaders([
                'HTTP_X-Requested-with'=>'XMLHttpRequest'
            ])
            ->getJson(
                route('tax.averageTaxRateOfTheCountry',$this->states[0]->country->id),
            )
            ->assertOk();
        //assert
        $this->assertEquals($expected, $response->getContent());
    }
    public function testOverallTaxesOfTheCountry()
    {
        $this->withoutExceptionHandling();
        //arrange
        $expected = ($this->countAmount1 * $this->countTaxRate1) + ($this->countAmount2 * $this->countTaxRate2) + ($this->countAmount3 * $this->countTaxRate3);
        //act
        $response=$this
            ->withHeaders([
                'HTTP_X-Requested-with'=>'XMLHttpRequest'
            ])
            ->getJson(
                route('tax.overallTaxesOfTheCountry',$this->states[0]->country->id),
            )
            ->assertOk();

        //assert
        $this->assertEquals($expected, $response->getContent());
    }

}
