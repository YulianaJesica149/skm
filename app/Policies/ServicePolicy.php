<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Service;
use Illuminate\Auth\Access\HandlesAuthorization;



class ServicePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // public function akses_service(User $user, Service $service)
    // {
    //     return $user->name ===  'Kepala Dinas';
    // }
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }
    // public function edit_service(User $user)
    // {
    //     return $user->name ===  'Admin';
    // }
    // public function delete_service(User $user)
    // {
    //     return $user->name ===  'Admin';
    // }
}
