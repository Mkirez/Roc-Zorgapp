<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'organization',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function intern(User $user){
        return $this->interns_at()->save($user);
    }

    // -------------------------- Relationships --------------------------

    public function logs()
    {
        return $this->hasMany(Log::class)->latest()->get();
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class)->latest()->get();
    }

    public function qualification_files()
    {
        return $this->hasMany(Qualification_file::class)->latest()->get();
    }

    public function interns_at()
    {
        return $this->belongsToMany(User::class, 'interns_at', 'user_id', 'bpv_user_id');
    }

    // -------------------------- ROLES --------------------------

    public function education()
    {
        return $this->user_type == 0;
    }

    public function student()
    {
        return $this->user_type == 1;
    }

    public function bpv()
    {
        return $this->user_type == 2;
    }
}
