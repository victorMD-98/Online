<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     private function getRandomUserId() {
        $existingUserIds = Like::pluck('id')->toArray();
        do {
            $casualID = User::get()->random()->id;
        } while (in_array($casualID, $existingUserIds));
            return $casualID;
    }
    public function definition(): array
    {
        return [
            'post_id'=>Post::get()->random()->id,
            'user_id'=>$this->getRandomUserId()
        ];
    }
}
