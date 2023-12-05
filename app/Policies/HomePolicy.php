<?php

namespace App\Policies;

use App\Models\Patient;
use Auth;
use Illuminate\Foundation\Auth\User;

class HomePolicy
{
   
    public function __construct()
    {
        //
    }

    public function view(User $user, Patient $patient)
{
  return false;
}

}
