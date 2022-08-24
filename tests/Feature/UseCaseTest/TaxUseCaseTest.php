<?php

namespace Tests\Feature\UseCaseTest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaxUseCaseTest extends TestCase
{

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
