<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Loai_Sach;
use Illuminate\Http\Request;

class Loai_SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaisach=Loai_Sach::all();
        return json_decode($loaisach);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loaisach = Loai_Sach::create($request->all());
        return response()->json($loaisach, 201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loaisach=Loai_Sach::find($id);
        return $loaisach;
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
        $loaisach = Loai_Sach::find($id);
        if($loaisach==null) return ;
        $loaisach->update($request->all());
        return response()->json($loaisach, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaisach=Loai_Sach::find($id);
        return $loaisach->delete();
    }
}
