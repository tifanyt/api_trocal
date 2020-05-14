<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ObjectsControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testShow()
    {
        $response = $this->json('GET', '/api/users/1/objects/4', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'key_words',
            'category',
            'zone',
            'photo',
            'state',
            'created_at' => [
                'date',
                'timezone_type',
                'timezone'
            ],
            'updated_at',
            'user' => [
                'id',
                'first_name',
                'last_name',
                'avatar'
            ]

        ]);
    }

    public function testPlacard()
    {
        $response = $this->json('GET', '/api/users/1/objects', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                '*' => [
                    'id',
                    'user_id',
                    'title',
                    'description',
                    'key_words',
                    'category',
                    'zone',
                    'photo',
                    'state',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);
    }

    public function testResearch()
    {
        
        $response = $this->json('GET', '/api/objects/research?zone=34&category=clothes', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                '*' => [
                    'id',
                    'user_id',
                    'title',
                    'description',
                    'key_words',
                    'category',
                    'zone',
                    'photo',
                    'state',
                    'created_at',
                    'updated_at',
                    'first_name',
                    'last_name',
                    'avatar'
                ]
            ]
        ]);
    }

    public function testStore()
    {
        $data = array(
            'user_id' => "1",
            'title' => 'Pull blanc',
            'description' => 'pull tricoté main',
            'key_words' => 'pull,laine,tricot',
            'category' => 'clothes',
            'zone' => '78',
            'photo' => 'photo',
            'state' => 'available'
        );
        $response = $this->json('POST', '/api/objects', $data, config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'user_id',
            'title',
            'description',
            'key_words',
            'category',
            'zone',
            'photo',
            'state',
            'created_at',
            'updated_at'
        ]);
    }

    public function testUpdate()
    {
        $data = array(
            'title' => 'Pull gris',
            'key_words' => 'pull,laine',
        );
        $response = $this->json('PUT', '/api/objects/1', $data, config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'user_id',
            'title',
            'description',
            'key_words',
            'category',
            'zone',
            'photo',
            'state',
            'created_at',
            'updated_at'
        ]);
    }

    public function testDestroy()
    {
        $response = $this->json('DELETE', '/api/objects/11', [], config('headers.headers_array'));
        $response -> assertStatus(200);
        $response->assertJson([
            'success' => 'true'
        ]);
    }
}
