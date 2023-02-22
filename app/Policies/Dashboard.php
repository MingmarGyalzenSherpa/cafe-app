<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Dashboard
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

    public function authorizeUsers(User $user, $dashboard)
    {
        //to authorize user based on their type [admin,cashier,waiter]
        switch ($dashboard) {
            case "admin":
                return $user->type == "admin";
                break;
            case "waiter":
                return $user->type == "waiter";
                break;
            case "cashier":
                return $user->type == "cashier";
                break;
            default:
                return false;
        }
    }
}
