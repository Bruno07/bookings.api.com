<?php 

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,100) as $i) {
            Client::create([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'birth' => $faker->date(),
                'identity' => $faker->numberBetween,
                'social_security' => $faker->numberBetween,
                'postal_code' => $faker->postcode,
                'address' => $faker->address,
                'number' => $faker->buildingNumber,
                'neighborhood' => $faker->streetName,
                'city' => $faker->city,
                'state' => $faker->state,
                'phone' => $faker->e164PhoneNumber,
                'cell_phone' => $faker->tollFreePhoneNumber
            ]);

            User::create([
                'login' => $faker->userName,
                'email' => $faker->email,
                'password' => $faker->password,
                'client_id' => $i
            ]);
        }
    }
}
