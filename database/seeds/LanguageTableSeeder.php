<?php 

use Illuminate\Database\Seeder;

use Faker\Factory;
use App\Models\Language;

class LanguageTableSeeder extends Seeder
{
    public function run()
    {
        $languages = array(
            'Português',
            'Inglês',
            'Espanhol',
            'Italiano',
            'Francês',
            'Alemão',
            'Japonês',
        );

        foreach ($languages as $language) {
            Language::create([
                'name' => $language
            ]);
        }
    }
}