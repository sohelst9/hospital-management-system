<?php

namespace App\Models;

use App\Models\Admin\Labtest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLabTestDetails extends Model
{
    protected $guarded = [];
    public function labtest()
    {
        return $this->belongsTo(Labtest::class, 'labtest_id');
    }

}
