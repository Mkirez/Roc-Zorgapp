<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification_file extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competitions()
    {
        return $this->hasMany(competition::class);
    }

    public function competitions_count()
    {
        return count($this->competitions);
    }

    public function getFileAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
