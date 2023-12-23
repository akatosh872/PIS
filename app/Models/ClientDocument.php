<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientDocument extends Model
{
    protected $fillable = ['claim_id', 'file_path', 'document_name'];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }
}
