<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->name = 'Aventura';
        $category->description = 'Peliculas que narran historias';
        $category->save();

        $category = new Category;
        $category->name = 'Terror';
        $category->description = 'Peliculas de miedo';
        $category->save();

        $category = new Category;
        $category->name = 'Acción';
        $category->description = 'Peliculas emocionantes';
        $category->save();
    }
}
