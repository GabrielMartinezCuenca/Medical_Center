<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
   
    public function canceled_appointment(): HasOne
    {
        return $this->hasOne(Canceled_appointment::class);
    }

    
    public function appointment_status():BelongsTo
    {
        return $this->belongsTo(Canceled_appointment::class);
    }
    
}
