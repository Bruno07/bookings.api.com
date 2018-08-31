<?php 

use Illuminate\Database\Seeder;

use App\Models\Author;
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,60) as $i) {
            Author::create([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'birth' => $faker->date,
                'postal_code' => $faker->postcode,
                'address' => $faker->address,
                'number' => $faker->buildingNumber,
                'neighborhood' => $faker->streetName,
                'city' => $faker->city,
                'state' => $faker->state,
                'email' => $faker->email,
                'web_site' => $faker->domainName,
                'phone' => $faker->e164PhoneNumber,
            ]);
        }
    }
}
