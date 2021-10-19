<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'address',
        'country_id',
        'state_id',
        'department_id',
        'city_id',
        'zip_code',
        'birthdate',
        'date_hired'
    ];
}