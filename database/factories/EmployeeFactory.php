<?php

namespace Database\Factories;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        $companyIds = Company::pluck('id')->toArray();

        return [
            'company_id' => $this->faker->randomElement($companyIds),
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'email' => fake()->safeEmail,
            'phone' => fake()->numerify('##########'),
        ];

    }
}
