<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_num';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'student_num',
        'first_name',
        'middle_name',
        'last_name',
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
