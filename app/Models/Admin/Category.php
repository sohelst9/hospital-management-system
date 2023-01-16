<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    
}
