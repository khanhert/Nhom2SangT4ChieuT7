<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\NXB;
use Illuminate\Http\Request;

class Nha_Xuat_BanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nxb=NXB::all();
        return json_decode($nxb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nxb = NXB::create($request->all());
        return response()->json($nxb, 201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nxb=NXB::find($id);
        return $nxb;
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
        $nxb = NXB::find($id);
        if($nxb==null) return ;
        $nxb->update($request->all());
        return response()->json($nxb, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nxb=NXB::find($id);
        return $nxb->delete();
    }
}
