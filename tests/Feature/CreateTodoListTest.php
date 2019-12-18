<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTodoListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function get_index_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    function create_new_todo_list_when_valid_params()
    {
        $response = $this->post('/create', [
            'category' => 'others',
            'description' => 'Buy Apple',
        ]);


        $this->assertDatabaseHas('todo_lists', [
            'description' => 'Buy Apple'
        ]);
    }
}
