<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'slug'=>Str::slug($this->faker->sentence()),
            'image'=>'assets/images/img_'.rand(1,4).'.jpg',
            'description'=>$this->faker->text(500),
            'category_id'=>rand(1,6),
            'user_id'=>1,
            'published_at'=>now()
        ];
    }
}
