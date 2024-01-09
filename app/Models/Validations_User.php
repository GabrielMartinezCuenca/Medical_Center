<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Validations_User extends Model
{
    use HasFactory;

    public $guarded = ['id', 'created_at', 'updated_at'];
 
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
