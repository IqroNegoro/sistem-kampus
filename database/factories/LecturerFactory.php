<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random = Random::generate(10, "a-z");
        return [
            "id" => Str::uuid(),
            "name" => "Irene",
            "nidn" => Random::generate(5, "0-9"),
            "birth_place" => "Aegir",
            "birth" => \Carbon\Carbon::now(),
            "address" => "Rhodes Island",
            "faculty_id" => '42f5cf3b-89b9-4510-b0a2-5eebb313c0a6',
            "phone" => "08978405369",
            "email" => "$random@gmail.com",
            "gender" => "Female",
            "photo" => "https://sanitygone.help/images/avatars/char_4009_irene.png"
        ];
    }
}
