<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ClientsTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('AuthorsTableSeeder');
        $this->call('PublishersTableSeeder');
        $this->call('LanguageTableSeeder');
        $this->call('FormatTableSeeder');
        $this->call('BookTableSeeder');
    }
}
