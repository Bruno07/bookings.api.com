<?php 

use Illuminate\Database\Seeder;

use App\Models\Book;
use Faker\Factory as Faker;

class BookTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,100) as $i) {
            Book::create([
                'code' => $faker->uuid,
                'image' => $faker->imageUrl,
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'author_id' => rand(1, 60),
                'category_id' => rand(1, 28),
                'publishing_company_id' => rand(1, 40),
                'language_id' => rand(1, 7),
                'format_id' => rand(1, 5),
                'publication_date' => $faker->date,
                'notice' => 'Volume'. rand(1, 3),
                'category' => rand(1, 5),
            ]);
        }
    }
}