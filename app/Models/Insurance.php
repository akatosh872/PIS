<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
        'claim_id',
        'user_id',
        'insurance_type_id',
        'monthly_fee',
        'start_date',
        'end_date',
        'installments',
        'enable'
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function insuranceType()
    {
        return $this->belongsTo(InsuranceType::class);
    }
}
