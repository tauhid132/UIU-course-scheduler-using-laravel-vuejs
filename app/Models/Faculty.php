<?php

namespace App\Models;

use App\Models\User;
use App\Models\Section;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'teacher_code',
        'office',
        'designation',
        'status',
        'phone',
        'pabx',
        'official_email',
        'room'
        
       
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function sections(){
        return $this->hasMany(Section::class);
    }
}
