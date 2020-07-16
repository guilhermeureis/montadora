<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = 'branches';

    public function automobiles()
    {
        return $this->hasMany('App\Automobile');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
