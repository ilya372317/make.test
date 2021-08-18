<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3,8), true);
        $category_id = rand(1,11);
        $user_id = rand(1,4) == 1 ? 1 : 2;
        $content = $this->faker->realText(rand(1000,4000));
        $is_published = rand(1,5) > 1;
        $created_at = $this->faker->dateTimeBetween('-3 months', '-2 months');

        $data = [
            'category_id' => $category_id,
            'user_id' => $user_id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content_raw' => $content,
            'content_html' => $content,
            'is_published' => $is_published,
            'published_at' => ($is_published) ? $this->faker->dateTimeBetween('-2 months', '-1 day'): null,
            'created_at' => $created_at,
            'updated_at' => $created_at,

        ];

        return $data;
    }
}
