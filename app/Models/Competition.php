<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qualification_file()
    {
        return $this->belongsTo(Qualification_file::class);
    }

    public function student_files()
    {
        return $this->hasMany(Student_file::class);
    }

    
}
