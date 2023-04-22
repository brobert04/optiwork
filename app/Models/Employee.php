<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function furloughRequests(){
        return $this->hasMany(FurloughRequests::class);
    }

    public function concedii(){
        return $this->hasMany(FurloughRequests::class)->where('status', 1);
    }
}
