<?php
namespace Database\Factories;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
        {
            $uniqueIdentifier = Str::random(8);
            $logoFileName = 'logo_' . $uniqueIdentifier . '.png';
            $image = $this->faker->image(storage_path("app/public"), 100, 100, 'business', false);
            Storage::move("public/{$image}", "public/{$logoFileName}");
            return [
                'companyname' => $this->faker->company,
                'logo' => $logoFileName, 
                'email' => $this->faker->unique->safeEmail,
                'website' => $this->faker->url,
            ];
        }
}
