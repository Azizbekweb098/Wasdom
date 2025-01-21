<?php

namespace App\Http\Controllers\Notifactions;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabarController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $notifications = $user->notifications;

        return Message::collection($user->notifications);
    }
}
