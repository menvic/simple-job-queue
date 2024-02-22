<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionControllerTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_submit_endpoint_returns_success(): void
    {
        $response = $this->postJson('/api/submit', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Submission received']);
    }

    public function test_submit_endpoint_handles_invalid_data()
    {
        $response = $this->postJson('/api/submit', [
            'name' => 'John Doe',
            'message' => 'This is a test message.',
        ]);

        $response->assertStatus(422)
            ->assertJson(['error' => 'Invalid data input']);
    }

    // public function test_submit_endpoint_handles_internal_error()
    // {
    //     $response = $this->postJson('/api/submit', [
    //         'name' => 'John Doe',
    //         'email' => 'john.doe@example.com',
    //         'message' => 'This is a test message.',
    //     ]);

    //     $response->assertStatus(500)
    //         ->assertJson(['error' => 'An error occurred while processing your request']);
    // }
}
