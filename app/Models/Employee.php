<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function attendace_monitorings()
    {
        return $this->hasMany(AttendaceMonitoring::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}