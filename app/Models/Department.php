<?php

namespace App\Models;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    // public function faculty_mem(){
    //     $this->belongsTo(Faculty::class);
    // }
    public function faculties(){
        $this->hasMany(Faculty::class);
    }
}
