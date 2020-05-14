<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionsControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this -> json('GET', '/api/users/1/transactions', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response -> assertJsonStructure([
            '*' => [
                'id',
                'buyer_id',
                'seller_id',
                'buyer_object_id',
                'seller_object_id',
                'state',
                'alternative_message',
                'created_at',
                'updated_at'
            ]
        ]);
    }
    public function testIndexState()
    {
        $response = $this -> json('GET', '/api/users/1/transactions?state=pending', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response -> assertJsonStructure([
            '*' => [
                'id',
                'buyer_id',
                'seller_id',
                'buyer_object_id',
                'seller_object_id',
                'state',
                'alternative_message',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    public function testShow()
    {
        $response = $this->json('GET', '/api/transactions/1', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'buyer_id',
            'seller_id',
            'buyer_object_id',
            'seller_object_id',
            'state',
            'alternative_message',
            'created_at',
            'updated_at'
        ]);
    }

    public function testStore()
    {
        $data = array(
            'buyer_id' => '1',
            'seller_id' => '2',
            'seller_object_id' => '2',
            'state' => 'pending'
        );
        $response = $this->json('POST', '/api/transactions', $data, config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'buyer_id',
            'seller_id',
            'buyer_object_id',
            'seller_object_id',
            'state',
            'alternative_message',
            'created_at',
            'updated_at'
        ]);
    }

    public function testUpdate()
    {
        $data = array(
            'buyer_object_id' => '6',
            'state' => 'accepted',
        );
        $response = $this->json('PUT', '/api/transactions/1', $data, config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'buyer_id',
            'seller_id',
            'buyer_object_id',
            'seller_object_id',
            'state',
            'alternative_message',
            'created_at',
            'updated_at'
        ]);
    }

}
