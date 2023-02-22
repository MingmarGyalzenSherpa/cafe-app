<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;



class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function authorizeDashboard(User $user, $dashboard)
    {
        dd($user->type);
        // switch ($dashboard) {
        //     case 'admin':
        //         return $user->type == "admin" ? true : false;
        //         break;

        //     case 'cashier':
        //         return $user->type == 'cashier' ? true : false;
        //         break;

        //     case 'waiter':
        //         return $user->type == "waiter" ? true : false;
        //     default:
        //         return true;
        // }
        return true;
    }
}
