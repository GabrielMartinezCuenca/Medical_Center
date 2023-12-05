<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;

class Request extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

  
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

 
    public function appointment(): HasOne
    {
        return $this->hasOne(Appointment::class);
    }

    
    public function doctor():BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    

}
