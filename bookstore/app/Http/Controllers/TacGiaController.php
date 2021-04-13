<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tac_Gia;

class TacGiaController extends Controller
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
        $tacgia = Tac_Gia::get();
        return view('admin.them-tac-gia', ['tacgia' => $tacgia]);
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
            'ten_tac_gia' => 'required',
            'ngay_sinh' => 'required',
            'gioi_thieu' => 'required',
           

        ]);
        
        $data = $request->all();
        $tacgia = new Tac_Gia();
        $tacgia->ten_tac_gia = $data['ten_tac_gia'];
        $tacgia->ngay_sinh =  $data['ngay_sinh'];
        $tacgia->gioi_thieu = $data['gioi_thieu'];

        $result = $tacgia->save();
        if ($result)
            return redirect('admin/ds-tg')->with('alert', 'Thêm thành công');
        else
            return redirect('admin/them-tg')->with('alert', 'Thêm không thành công');
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
        $tacgia = Tac_Gia::find($id);
        return view('admin.cap-nhap-tg', ['tacgia' => $tacgia]);
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
        $tacgia = Tac_Gia::find($id);
        $data = $request->all();
        $tacgia->ten_tac_gia = $data['ten_tac_gia'];
        $tacgia->ngay_sinh =  $data['ngay_sinh'];
        $tacgia->gioi_thieu = $data['gioi_thieu'];

        $result = $tacgia->save();
        if ($result)
            return redirect('admin/ds-tg')->with('alert', 'Cập nhập thành công');
        else
            return redirect('admin/cap-nhat-tg')->with('alert', 'Cập nhập không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tacgia = Tac_Gia::find($id);
        $tacgia->delete();
        return redirect('admin/ds-tg')->with('alert', 'Xoá thành công');
    }
}
