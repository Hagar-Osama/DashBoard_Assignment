<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::select('id')->get()->toarray();
        static $counter = 0;
        return [
            'name'=>$this->faker->name(),
            'twitter_url'=>$this->faker->url,
            'facebook_url'=>$this->faker->url,
            'user_id'=>$users[$counter++]['id']

        ];
    }
}
