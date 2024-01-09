<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakePasswordDoctorRequest;
use App\Models\User;
use App\Models\Validations_User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Str;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.edit')->only('edit','update');
        $this->middleware('can:user.destroy')->only('destroy');

    }
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $roles = $request->roles;
        $roleModels = Role::whereIn('id', $roles)->get();
        $roleNames = $roleModels->pluck('name')->toArray();
        $user->syncRoles($roleNames);

        return redirect()->route('user.edit', $user->id);
    }


    public function generatePassword($token){
        return view('verification.generatePassword', compact('token'));
    }

    public function changePassword($token, MakePasswordDoctorRequest $request)
    {
        $token_validation = Validations_User::where([['token', $token], ['status', 1]])->first();
        if($token_validation){
            $user = User::find($token_validation->user_id);
            if($user && $user->email == $request->email){
                $user -> update(
                    ['password' => $request -> password]
                 );
                 return view('auth.login');
            }
            else{
                return view('home');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user -> delete();

        return redirect()->action([UserController::class, 'index']);

    }
}
