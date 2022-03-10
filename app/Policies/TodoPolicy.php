<?php

namespace App\Policies;

use App\User;
use App\TodoNote;

class TodoPolicy
{
    public function update(User $user, TodoNote $todo) {
        return $todo->user_id === $user->id;
    }
}
