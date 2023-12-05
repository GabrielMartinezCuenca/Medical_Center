<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment_status extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    public function appointment():HasMany
    {
        return $this->hasMany(Appointment::class);
    }
    

}
