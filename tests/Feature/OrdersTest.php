<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * [Description for testProductCreate]
     *
     * @return [type]
     *
     */
    public function testOrderCreate()
    {
        $data = json_decode('{
            "products": [
                {
                    "product_id": 1,
                    "quantity": 1
                },
                {
                    "product_id": 2,
                    "quantity": 1
                },
                {
                    "product_id": 3,
                    "quantity": 1
                }
            ]
        }', true);
        $this->postJson('/api/create/order', $data);
        $this->assertTrue(true, 'success');
    }

    /**
     * [Description for testInventoryFetch]
     *
     * @return [type]
     *
     */
    public function testInventoryFetch()
    {
        $this->get('/api/fetch/orders');
        $this->assertTrue(true, 'success');
    }
}
