<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TacGia;
use Illuminate\Http\Request;

class Tac_GiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tacgia=TacGia::all();
        return json_decode($tacgia);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tacgia = TacGia::create($request->all());
        return response()->json($tacgia, 201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tacgia=TacGia::find($id);
        return $tacgia;
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
        $tacgia = TacGia::find($id);
        if($tacgia==null) return ;
        $tacgia->update($request->all());
        $tacgia->save();
        return response()->json($tacgia, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tacgia=TacGia::find($id);
        if($tacgia=!null)
        {
           return TacGia::destroy($id);
        }
        else
        return;
    }
}
