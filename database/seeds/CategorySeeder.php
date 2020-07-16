<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->category = 'entrada';
        $category->save();

        $category = new Category();
        $category->category = 'hatch pequeno';
        $category->save();

        $category = new Category();
        $category->category = 'hatch médio';
        $category->save();

        $category = new Category();
        $category->category = 'sedã médio';
        $category->save();

        $category = new Category();
        $category->category = 'sedã grande';
        $category->save();

        $category = new Category();
        $category->category = 'SVU';
        $category->save();

        $category = new Category();
        $category->category = 'pick-ups';
        $category->save();

    }
}
