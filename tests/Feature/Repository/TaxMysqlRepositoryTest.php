<?php

namespace Tests\Feature\Repository;

use App\Models\County;
use App\Models\CountyIncome;
use App\Models\State;
use App\Repository\Tax\TaxMysqlRepository;
use Tests\Feature\Helper\TaxHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaxMysqlRepositoryTest extends TestCase
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
        $TaxMysqlRepository = new TaxMysqlRepository();
        $result = $TaxMysqlRepository->overallAmountOfTaxesPerState($this->states[0]->id);
        //assert

        $this->assertEquals($expected, $result);
    }

    public function testAverageAmountOfTaxesPerState()
    {
        //arrange
        $expected = (($this->countAmount1 * $this->countTaxRate1) + ($this->countAmount2 * $this->countTaxRate2) + ($this->countAmount3 * $this->countTaxRate3)) / 3;
        //act
        $TaxMysqlRepository = new TaxMysqlRepository();
        $result = $TaxMysqlRepository->averageAmountOfTaxesPerState($this->states[0]->id);
        //assert

        $this->assertEquals($expected, $result);
    }

    public function testAverageCountryTaxRatePerState()
    {
        //arrange
        $expected = ($this->countTaxRate1 + $this->countTaxRate2 + $this->countTaxRate3) / 3;
        //act
        $TaxMysqlRepository = new TaxMysqlRepository();
        $result = $TaxMysqlRepository->averageCountryTaxRatePerState($this->states[0]->id);
        //assert

        $this->assertEquals($expected, $result);
    }

    public function testAverageTaxRateOfTheCountry()
    {
        //arrange
        $expected = (($this->countTaxRate1 + $this->countTaxRate2 + $this->countTaxRate3) * 5) / (3 * 5);
        //act
        $TaxMysqlRepository = new TaxMysqlRepository();

        $result = $TaxMysqlRepository->averageTaxRateOfTheCountry($this->states[0]->country->id);
        //assert

        $this->assertEquals($expected, $result);
    }

    public function testOverallTaxesOfTheCountry()
    {
        //arrange
        $expected = ($this->countAmount1 * $this->countTaxRate1) + ($this->countAmount2 * $this->countTaxRate2) + ($this->countAmount3 * $this->countTaxRate3);
        //act
        $TaxMysqlRepository = new TaxMysqlRepository();
        $result = $TaxMysqlRepository->overallTaxesOfTheCountry($this->states[0]->country->id);
        //assert
        $this->assertEquals($expected, $result);
    }

}
