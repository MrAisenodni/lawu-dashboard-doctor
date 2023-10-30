<?php

namespace Database\Factories\Management;

use App\Models\Management\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    protected $model = Patient::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Data Pasien
            'rm_no'             => $this->faker->randomNumber(6, true),
            'registration_no'   => $this->faker->randomNumber(9, true),
            'registration_date' => $this->faker->dateTimeThisYear(),
            'action_id'         => $this->faker->numberBetween(1, 3),
            'assurance_id'      => $this->faker->numberBetween(1, 3),
            'hospital_id'       => $this->faker->numberBetween(1, 7),
            'visit_method_id'   => $this->faker->numberBetween(1, 5),

            // Data Pribadi Pasien
            'nik'               => $this->faker->nik(),
            'full_name'         => $this->faker->name(),
            'birth_place'       => $this->faker->city(),
            'birth_date'        => $this->faker->date(),
            'gender_id'         => $this->faker->numberBetween(1, 2),
            'religion_id'       => $this->faker->numberBetween(1, 6),

            // Kontak Pasien
            'address_1'         => $this->faker->address(),
            'district_id'       => $this->faker->numberBetween(1, 6642),
            'ward'              => $this->faker->state(),
            'post_code'         => $this->faker->postcode(),
            'email'             => $this->faker->unique()->safeEmail(),
            'phone_number'      => $this->faker->e164PhoneNumber(),

            // Struktur Baku
            'disabled'          => 0,
            'created_by'        => 'Migrasi',
            'created_at'        => now(),
        ];
    }
}
