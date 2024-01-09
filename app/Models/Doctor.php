<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function requests():HasMany
    {
        return $this->hasMany(Request::class);
    }

    public function consulting_room():BelongsTo
    {
        return $this->belongsTo(Consulting_room::class);
    }

    public function medical_especiality():BelongsTo
    {
        return $this->belongsTo(Medical_especiality::class);
    }

    public function prescription(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }





}
