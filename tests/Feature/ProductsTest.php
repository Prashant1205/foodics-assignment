<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testProductCreate()
    {
        $data = json_decode('{
            "products" :[{
                    "name" : "sandwich",
                    "ingredients" : {
                        "onion" : "20g",
                        "meat" : "100g",
                        "cheese": "20g",
                        "olives" : "20g"
                    }
                },
                {
                    "name" : "burger",
                    "ingredients" : {
                        "onion" : "20g",
                        "meat" : "100g",
                        "cheese": "20g",
                        "tamato" : "10g"
                    }
                },
                {
                    "name" : "Pizza",
                    "ingredients" : {
                        "onion" : "20g",
                        "meat" : "100g",
                        "cheese": "400g",
                        "carrot" : "20g",
                        "herbs" : "15g"
                    }
                }
            ]
        }', true);
        $this->postJson('/api/create/product', $data);
        $this->assertTrue(true, 'success');
    }

    /**
     * [Description for testProductFetch]
     *
     * @return [type]
     *
     */
    public function testProductFetch()
    {
        $this->get('/api/fetch/products');
        $this->assertTrue(true, 'success');
    }
}
