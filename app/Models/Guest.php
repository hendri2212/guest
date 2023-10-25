<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;


    protected $fillable = [
        'full_name',
        'phone',
        'company'
        // '_token'
    ];

    public function Company() {
        return $this->belongsTo(Company::class);
    }

    public function perusahaan(){
        return $this->Company();
    }
}
