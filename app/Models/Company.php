<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }
}
