<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Request;
use App\Models\User;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }

    public function prescription()
    {
        return $this->hasMany(Prescription::class);
    }



}
