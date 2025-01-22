<?php

namespace App\Http\Controllers\Contact;

use App\Events\ContactEvent;
use App\Http\Controllers\Controller;
use App\Jobs\ContactJob;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
      $requestData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'text' => ['required', 'string'],
      ]);

      
    ContactJob::dispatch($requestData);

      return response()->json(['xat' => 'habar yuborildi']);
    }
}
