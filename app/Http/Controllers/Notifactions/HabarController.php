<?php

namespace App\Http\Controllers\Notifactions;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class HabarController extends Controller
{
    public function index()
    {
        $notifications = DatabaseNotification::all(); // Barcha notifikatsiyalarni olish

        return response()->json(Message::collection($notifications)); 
    }
}
