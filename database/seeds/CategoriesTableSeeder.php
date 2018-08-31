<?php 

use Illuminate\Database\Seeder;

use Faker\Factory;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = array(
            'Administração, Negócios e Economia',
            'Arte, Cinema e Fotografia',
            'Artesanato, Casa e Estilo de Vida',
            'Autoajuda',
            'Biografias e Histórias Reais',
            'Ciências',
            'Computação, Informática e Mídias Digitais',
            'Crônicas, Humor e Entretenimento',
            'Direito',
            'Educação, Referência e Didáticos',
            'Engenharia e Transporte',
            'Erótico',
            'Esportes e Lazer',
            'Fantasia, Horror e Ficção Científica',
            'Gastronomia e Culinária',
            'História',
            'HQs, Mangás e Graphic Novels',
            'Infantil',
            'Jovens e Adolescentes',
            'Literatura e Ficção',
            'Medicina',
            'Policial, Suspense e Mistério',
            'Política, Filosofia e Ciências Sociais',
            'Religião e Espiritualidade',
            'Romance',
            'Saúde e Família',
            'Turismo e Guias de Viagem',
            'Inglês e Outras Línguas',
        );

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}