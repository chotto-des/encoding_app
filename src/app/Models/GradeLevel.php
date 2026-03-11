<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    protected $primaryKey = 'grade_level_id';

    protected $fillable = [
        'grade_level_name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'grade_level_id', 'grade_level_id');
    }
}
