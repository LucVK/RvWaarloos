<?php

namespace Database\Factories\Rv;

use App\Models\Rv\ClubMember;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rv\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstname = fake()->firstName();
        $lastname = fake()->lastName();

        return [
            // 'firstname' => $firstname,
            // 'lastname' => $lastname,
            "club_member_id" => ClubMember::factory()->create(['firstname' => $firstname, 'lastname' => $lastname]),
            // "user_id" => ClubMember::factory()->create(['firstname' => $firstname, 'lastname' => $lastname]),
            "birthdate" =>fake()->date,
            "streetandnumber" => fake()->streetAddress(),
            "city" => fake()->city(),
            "zipcode" => fake()->numberBetween(1000,9000),
            "phone" => fake()->phoneNumber,
        ];
    }
}
