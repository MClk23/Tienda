<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    /**@test */

    public function test_guardar_product(){
        $response = $this->post('/api/products',[
            'name' => 'arroz',
            'price' => 2000
        ]);

        $response->assertJsonStructure(["name", "price"])
        ->assertJson(['name'=>'arroz'])
        ->assertJson(201);

        $this->assertDatabaseHas('products', ['name'=>'arroz', 'price'=>2000]);
    }



}
