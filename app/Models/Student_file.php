<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_file extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competition()
    {
        return $this->belongsTo(competition::class);
    }

    public function getFileAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function findIdAndProperty($id, $property)
    {
        return $this->where('user_id', $id)->get()->pluck($property)->first();
    }


}
