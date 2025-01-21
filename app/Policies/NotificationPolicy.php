<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;


class NotificationPolicy
{
  public function view(User $user, DatabaseNotification $notification)
  {
    return $user->id = $notification->notifiable_id;
  }
}
