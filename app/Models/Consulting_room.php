<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consulting_room extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    public function request():HasMany
    {
        return $this->hasMany(Request::class);
    }
    
    


}
