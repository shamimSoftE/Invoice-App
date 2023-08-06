<?php

namespace Database\Factories;

use App\Models\Counter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Counter::class;

    public function definition(): array
    {
        return [
            'key' => 'invoice',
            'prefix' => 'INV-',
            'value' => '20000'
        ];
    }
}
