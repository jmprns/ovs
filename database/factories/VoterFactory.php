<?php

namespace Database\Factories;

use App\Models\Block;
use App\Models\Election;
use App\Models\Voter;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'fname' => $this->faker->firstName,
                'lname' => $this->faker->lastName,
                'mname' => $this->faker->lastName
            ],
            'token' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'block_id' => Block::all(['id'])->random()->id,
            'election_id' => Election::all(['id'])->random()->id,
        ];
    }
}
