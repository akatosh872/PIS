<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{

    protected $table = 'compensation_payment';

    protected $fillable = [
        'user_id',
        'claim_id',
        'payment_amount',
        'payment_notes',
        'payment_approved',
        'created_at',
        'updated_at',
    ];
}
