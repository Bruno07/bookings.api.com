<?php 

use Illuminate\Database\Seeder;

use App\Models\Publisher;
use Faker\Factory as Faker;

class PublishersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,40) as $i) {
            Publisher::create([
                'fantasy_name' => $faker->company,
                'cnpj' => $faker->numberBetween,
                'postal_code' => $faker->postcode,
                'address' => $faker->address,
                'number' => $faker->buildingNumber,
                'neighborhood' => $faker->streetName,
                'city' => $faker->city,
                'state' => $faker->state,
                'phone' => $faker->e164PhoneNumber,
            ]);
        }
    }
}
