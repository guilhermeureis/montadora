<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Automobile extends Model
{
    use SoftDeletes;

    protected $table = 'automobiles';
}
