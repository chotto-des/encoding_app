<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'grade_level_id',
        'elementary_school',
        'province',
        'municipality',
        'barangay',
    ];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id', 'grade_level_id');
    }
}
