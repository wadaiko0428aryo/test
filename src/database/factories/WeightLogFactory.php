<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;

class WeightLogFactory extends Factory
{
    protected $model = WeightLog::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 30, 150),
            'calories' => $this->faker->numberBetween(1000, 3000),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->text(120),
        ];
    }
}