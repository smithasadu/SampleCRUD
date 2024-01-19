<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstname','lastname','company_id','email','phone'
    ];
    // Define the relationship with the Company model
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
