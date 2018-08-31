<?php 

use Illuminate\Database\Seeder;

use Faker\Factory;
use App\Models\Format;

class FormatTableSeeder extends Seeder
{
    public function run()
    {
        $formats = array(
            'Capa Dura',
            'Capa Comum',
            'eBook Kindle',
            'Box e Coleções',
            'Livros Impressos',
        );

        foreach ($formats as $format) {
            Format::create([
                'name' => $format
            ]);
        }
    }
}