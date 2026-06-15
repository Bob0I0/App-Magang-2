<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_returns_ok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
