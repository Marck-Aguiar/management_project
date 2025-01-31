<?php

namespace Tests\Feature;

use Tests\TestCase;
use Core\User\Models\User;
use Core\Activity\DTOs\ActivityDTO;
use Core\Activity\Cases\CreateActivity;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_activity(): void
    {
        $case = app(CreateActivity::class);

        User::factory()->create();

        $payload = new ActivityDTO(
            title: "Atividade Inovadora",
            description: "Ideia Inovadora",
            points: 20,
            userID: 1,
            disciplineID: 2
        );

        $case->execute($payload);

        $this->assertDatabaseCount('activities', 1);
        $this->assertDatabaseHas('activities', [
            'description' => 'Ideia Inovadora',
            'points' => 20,
            'user_id' => 1
        ]);
    }
}
