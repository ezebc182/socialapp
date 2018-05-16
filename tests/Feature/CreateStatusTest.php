<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_users_can_not_create_statuses()
    {
        $response = $this->post(route('statuses.store'), [
           'body' => 'My status'
        ]);

        $response->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_user_can_create_statuses()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->postJson(route('statuses.store'), [ 'body' => 'My status']);

        $response->assertJson(['body' => 'My status']);



        $this->assertDatabaseHas('statuses', [
            'user_id' => $user->id,
            'body' => 'My status'
        ]);
    }

    /** @test */
    public function a_status_requires_a_body()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->postJson(route('statuses.store'), [ 'body' => '']);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message', 'errors' => ['body']
        ]);
    }

    /** @test */
    public function a_status_body_requires_a_minimum_length()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->postJson(route('statuses.store'), [ 'body' => 'abc']);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message', 'errors' => ['body']
        ]);
    }
}
