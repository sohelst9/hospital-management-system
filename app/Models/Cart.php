<?php

namespace App\Models;

use App\Models\Admin\Hospital;
use App\Models\Admin\Labtest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function labtest(){
        return $this->belongsTo(Labtest::class, 'labtest_id');
    }
}
