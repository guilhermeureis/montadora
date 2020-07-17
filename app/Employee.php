<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $table = 'employees';

    protected $fillable = [
        'name', 'cpf', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
}
