<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'trimester',
        'program',
        'formal_code',
        'title',
        'section_name',
        'capacity',
        'occupied',
        'reg_count',
        'room1',
        'room2',
        'day1',
        'day2',
        'time1',
        'time2',
        'grade_sheet_template',
        'credits',
        'if_dropped',
        'assigned_faculty',
        
    ];

    public function faculty(){
        return $this->hasOne(Faculty::class);
    }
}
