<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender();
        $gender->gender = 'Masculino';
        $gender->save();

        $gender = new Gender();
        $gender->gender = 'Feminino';
        $gender->save();

    }
}
