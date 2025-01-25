<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function userUpdate(Request $reqest)
    {
        $user = Auth::user();
        $user->name = $reqest->input('name');
        $user->phone = $reqest->input('phone');

        $user->save();
        return response()->json(['message' => 'Malumotlar Ozgartirildi']);
    }
    public function userPassword(Request $request)
    {
        $user = auth()->user();
    
        
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Eski parol noto\'g\'ri.'], 400);
        }

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Parolni tasdiqlash xatoliklari mavjud.'], 400);
        }
    
    
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return response()->json(['message' => 'Parol muvaffaqiyatli yangilandi.'], 200);
    }
}
