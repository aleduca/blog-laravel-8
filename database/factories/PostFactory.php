<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $thumb =  $this->faker->image('public/images/posts', 640, 480);
        $title =  $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'user_id' => User::pluck('id')->random(),
            'content' => $this->faker->paragraph(),
            'thumb' => str_replace('public', '', $thumb),
        ];
    }
}
