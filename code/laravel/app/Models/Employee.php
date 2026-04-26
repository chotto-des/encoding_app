<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id',
        'first_name',
        'middle_name',
        'last_name',
        'province',
        'municipality',
        'barangay',
        'date_of_birth',
        'contact_number',
        'education_level',
    ];
}
