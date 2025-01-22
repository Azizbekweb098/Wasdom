<?php

namespace App\Http\Controllers;

use App\Http\Resources\TextResource;
use App\Models\Contact;
use App\Models\Text;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function text()
    {
        $text = Text::all();

        return response()->json(TextResource::collection($text));
        
    }
    public function contacts()
    {
        $contact = Contact::all();

        return response()->json($contact);
    }
    public function delete($id)
    {
     $requestData = Contact::find($id);
     return response()->json(['xat' => 'ochirildi']);    
    }

    public function show($id)
    {
        $requestData = Contact::find($id);

        return response()->json($requestData);
    }
}
