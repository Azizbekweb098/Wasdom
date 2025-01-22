<?php

namespace App\Http\Controllers\Text;

use App\Http\Controllers\Controller;
use App\Http\Resources\TextResource;
use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $text = Text::all();
        return response()->json(TextResource::collection($text));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        Text::create($requestData);

        return response()->json('Text Yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $requestData = Text::find($id);

        return response()->json(new TextResource($requestData));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = Text::find($id);

        $requestData->update($request->all());

        return response()->json('ozgartirildi');
    }
    public function destroy(string $id)
    {
        $requestData = Text::find($id);

        $requestData->delete();

        return response()->json('ochirildi');
    }
}
