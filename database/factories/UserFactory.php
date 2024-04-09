<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected static ?string $password;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'document-id' => rand(111111,999999),
            'password' => static::$password ??= Hash::make('password'),
            //'remember_token' => Str::random(10),
        ];
    }

}
