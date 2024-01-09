<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescription extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function patient():BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor():BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function request():BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
