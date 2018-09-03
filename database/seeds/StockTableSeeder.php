<?php 

use App\Models\Stock;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(0,100) as $i) {

            if ($i === 0)
                continue;

            Stock::create([
                'quantity' => rand(3, 10),
                'book_id' => $i 
            ]);
        }
    }
}