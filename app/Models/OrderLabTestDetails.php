<?php

namespace App\Models;

use App\Models\Admin\Hospital;
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

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function labtestTime()
    {
        return $this->hasOne(LabtestTime::class, 'labtest_order_id');
    }

}
