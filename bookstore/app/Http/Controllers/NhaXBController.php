<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nha_Xuat_Ban;


class NhaXBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $NXB = Nha_Xuat_Ban::get();
        return view('admin.them-nxb', ['NXB' => $NXB]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ten_nha_xuat_ban' => 'required',
            'dia_chi' => 'required',
            'dien_thoai' => 'required',
            'email' => 'required',
        ]);
        $data = $request->all();
        $nxb = new Nha_Xuat_Ban();
        $nxb->ten_nha_xuat_ban = $data['ten_nha_xuat_ban'];
        $nxb->dia_chi = $data['dia_chi'];
        $nxb->dien_thoai = $data['dien_thoai'];
        $nxb->email = $data['email'];

        $result = $nxb->save();
        if ($result)
            return redirect('admin/ds-nxb')->with('alert', 'Thêm thành công');
        else
            return redirect('admin/them-nxb')->with('alert', 'Thêm không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $NXB = Nha_Xuat_Ban::find($id);
        return view('admin.cap-nhat-nxb', ['NXB' => $NXB]);
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
        $nxb = Nha_Xuat_Ban::find($id);
        $data = $request->all();
        $nxb->ten_nha_xuat_ban = $data['ten_nha_xuat_ban'];
        $nxb->dia_chi = $data['dia_chi'];
        $nxb->dien_thoai = $data['dien_thoai'];
        $nxb->email = $data['email'];

        $result = $nxb->save();
        if ($result)
            return redirect('admin/ds-nxb')->with('alert', 'Thêm thành công');
        else
            return redirect('admin/cap-nhat-nxb')->with('alert', 'Thêm không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nxb = Nha_Xuat_Ban::find($id);
        $nxb->delete();
        return redirect('admin/ds-nxb')->with('alert', 'Xoá thành công');
    }
}
