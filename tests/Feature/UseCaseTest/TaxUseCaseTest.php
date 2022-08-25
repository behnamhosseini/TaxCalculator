<?php

namespace Tests\Feature\UseCaseTest;

use App\Repository\Tax\TaxRepositoryInterface;
use App\UseCase\Tax\TaxUseCase;
use Mockery\MockInterface;
use Tests\Feature\Helper\TaxHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaxUseCaseTest extends TestCase
{

    public function testOverallAmountOfTaxesPerStateReturnsInt()
    {
        //arrange
        $excepted=10;
        $mock = $this->mock(TaxRepositoryInterface::class, function (MockInterface $mock) use($excepted){
            $mock->shouldReceive('overallAmountOfTaxesPerState')
                ->andReturn($excepted)
                ->once();
        });
        $taxUseCase=new TaxUseCase($mock);
        //act
        $result=$taxUseCase->overallAmountOfTaxesPerState(1);

        //assert
        $this->assertEquals($excepted,$result);
    }
    public function testOverallAmountOfTaxesPerStateReturnsFloat()
    {
        //arrange
        $excepted=0.57;
        $mock = $this->mock(TaxRepositoryInterface::class, function (MockInterface $mock) use($excepted){
            $mock->shouldReceive('overallAmountOfTaxesPerState')
                ->andReturn(0.56687)
                ->once();
        });
        $taxUseCase=new TaxUseCase($mock);
        //act
        $result=$taxUseCase->overallAmountOfTaxesPerState(1);

        //assert
        $this->assertEquals($excepted,$result);
    }

    public function testaverageAmountOfTaxesPerState()
    {
        //arrange
        $excepted=10;
        $mock = $this->mock(TaxRepositoryInterface::class, function (MockInterface $mock) use($excepted){
            $mock->shouldReceive('averageAmountOfTaxesPerState')
                ->andReturn($excepted)
                ->once();
        });
        $taxUseCase=new TaxUseCase($mock);
        //act
        $result=$taxUseCase->averageAmountOfTaxesPerState(1);

        //assert
        $this->assertEquals($excepted,$result);
    }

    public function testAverageCountryTaxRatePerState()
    {
        //arrange
        $excepted=10;
        $mock = $this->mock(TaxRepositoryInterface::class, function (MockInterface $mock) use($excepted){
            $mock->shouldReceive('averageCountryTaxRatePerState')
                ->andReturn($excepted)
                ->once();
        });
        $taxUseCase=new TaxUseCase($mock);
        //act
        $result=$taxUseCase->averageCountryTaxRatePerState(1);

        //assert
        $this->assertEquals($excepted,$result);
    }

    public function testAverageTaxRateOfTheCountry()
    {
        //arrange
        $excepted=10;
        $mock = $this->mock(TaxRepositoryInterface::class, function (MockInterface $mock) use($excepted){
            $mock->shouldReceive('averageTaxRateOfTheCountry')
                ->andReturn($excepted)
                ->once();
        });
        $taxUseCase=new TaxUseCase($mock);
        //act
        $result=$taxUseCase->averageTaxRateOfTheCountry(1);

        //assert
        $this->assertEquals($excepted,$result);
    }

    public function testOverallTaxesOfTheCountry()
    {
        //arrange
        $excepted=10;
        $mock = $this->mock(TaxRepositoryInterface::class, function (MockInterface $mock) use($excepted){
            $mock->shouldReceive('overallTaxesOfTheCountry')
                ->andReturn($excepted)
                ->once();
        });
        $taxUseCase=new TaxUseCase($mock);
        //act
        $result=$taxUseCase->overallTaxesOfTheCountry(1);

        //assert
        $this->assertEquals($excepted,$result);
    }

}
