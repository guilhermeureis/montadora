<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee();
        $employee->branch_id = 1;
        $employee->name = 'João Paulo da Silva';
        $employee->birthday = '1990-12-01';
        $employee->gender_id = 1;
        $employee->cpf = '681.006.410-99';
        $employee->full_address = 'Rua Rio de Janeiro, 1029. Morumbi. São Paulo.';
        $employee->role = 'Diretor Geral';
        $employee->amount = 20000.00;
        $employee->status = 1;
        $employee->password = bcrypt('abc123');
        $employee->save();
    }
}
