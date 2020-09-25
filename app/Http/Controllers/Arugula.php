<?php

namespace App\Http\Controllers;

use App\Models\Arugula as ModelsArugula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Arugula extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ModelsArugula::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|max:200",
            "type" => "required|max:200"
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->messages()], 422);
        }
        $arugula = new ModelsArugula();
        $arugula->name = $request->name;
        $arugula->type = $request->type;

        $arugula->save();

        return response()->json($arugula, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(ModelsArugula::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|max:200",
            "type" => "required|max:200"
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->messages()], 422);
        }
        $arugula = ModelsArugula::find($request->arugula);
        $arugula->name = $request->name;
        $arugula->type = $request->type;

        $arugula->save();

        return response()->json($arugula, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsArugula::find($id)->delete();
        return response("", 204);
    }
}
