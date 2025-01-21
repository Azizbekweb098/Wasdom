<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Events\LoginNotifactionEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthStoreRequest;
use App\Models\User;
use App\Notifications\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login(AdminAuthStoreRequest $request)
  {
      // Foydalanuvchini telefon orqali qidiring
      $user = User::where('phone', $request->phone)->first();
  
      if (!$user || !Hash::check($request->password, $user->password)) {
          return response()->json(['error' => 'Unauthorized'], 401);
      }
  
      // Foydalanuvchini tizimga kiritish
      Auth::login($user);
  
      // Token yaratish
      $token = $user->createToken('Vel Token')->plainTextToken;
  
      // Xabar yuborish
     $user->notify(new UserRegister($user));
  
      return response()->json([
          'message' => 'Siz WasDom Dasturiga kirdingiz',
          'token' => $token,
      ]);
  }
  
}
