<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'gender'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function company(){
        return $this->hasOne(Company::class);
    }
}
