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
    public function testShow()
    {
        $response = $this->json('GET', '/api/users/1', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'first_name',
            'last_name',
            'email',
            'email_verified_at',
            'phone',
            'bio',
            'avatar',
            'post_code',
            'zone',
            'note',
            'created_at',
            'updated_at'
        ]);
    }




}
