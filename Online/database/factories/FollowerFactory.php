<?php

namespace Database\Factories;

use App\Models\Follower;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private function getRandomUserId() {
        $existingUserIds = Follower::pluck('id')->toArray();
        do {
            $casualID = User::get()->random()->id;
        } while (in_array($casualID, $existingUserIds));
            return $casualID;
    }
    public function definition(): array
    {
        return [
            
            'follower_user_id'=> $this->getRandomUserId(),
            'following_user_id'=> $this->getRandomUserId()
        ];
    }
}
