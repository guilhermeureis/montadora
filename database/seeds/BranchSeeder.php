<?php

use App\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch = new Branch();
        $branch->name = 'Matriz';
        $branch->full_address = 'Rua Belo Horizonte, 15. Centro. São Paulo.';
        $branch->state_registration = '318571049798';
        $branch->cnpj = '67.497.731/0001-65';
        $branch->save();
    }
}
