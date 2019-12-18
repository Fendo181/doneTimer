<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTodoListTest extends TestCase
{
    /**
     * @test
     */
    public function get_index_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
