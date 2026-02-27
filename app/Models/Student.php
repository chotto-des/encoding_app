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
    
    //full name helper
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }   

    //full address helper
    public function getFullAddressAttribute()
    {
        return trim("{$this->barangay}, {$this->municipality}, {$this->province}");
    }

}
