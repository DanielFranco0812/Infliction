<?php

namespace Tests\Feature;

use Tests\TestCase;

class AthenaAiTest extends TestCase
{
    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_registration_page_is_accessible(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
