<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contact',
        'information',
        'status_id',
        'service_type',
        'insurance_id',
        'insurance_type_id'
    ];

    public function status()
    {
        return $this->belongsTo(Statuses::class);
    }

    public function insuranceType()
    {
        return $this->belongsTo(InsuranceType::class, 'insurance_type_id');
    }

    public function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
