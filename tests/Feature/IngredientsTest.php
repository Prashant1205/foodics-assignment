<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IngredientsTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testInventoryCreate()
    {
        $data = json_decode('{
            "onion": 10,
            "meat" : 20,
            "cheese" : 5,
            "olives" : 2,
            "tamato" : 10,
            "corn" : 20,
            "herbs" : 10,
            "carrot": 10
        }', true);
        $this->postJson('/api/create/ingredient-inventory', $data);
        $this->assertTrue(true, 'success');
    }

    /**
     * [Description for testProductFetch]
     *
     * @return [type]
     *
     */
    public function testInventoryFetch()
    {
        $this->get('/api/fetch/inventory');
        $this->assertTrue(true, 'success');
    }
}
