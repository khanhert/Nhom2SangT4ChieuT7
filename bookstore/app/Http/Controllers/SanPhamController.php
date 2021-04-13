<?php

namespace App\Http\Controllers;

use App\Models\Loai_Sach;
use App\Models\Nha_Xuat_Ban;
use App\Models\Sach;
use App\Models\Tac_Gia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Cursor;


class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        $DsSachTA = Sach::where('id_loai_sach', '=', 1)->limit(8)->get();
        $DsSachTCHH = Sach::where('id_loai_sach', '=', 15)->limit(8)->get();
        $DsSachVHVN = Sach::where('id_loai_sach', '=', 16)->limit(4)->get();
        $DsSachbanchay = Sach::orderBy('don_gia', 'desc')->limit(4)->get();
        $loaisachTA=Loai_Sach::where('id','=',1)->get();
        $loaisachTCHH=Loai_Sach::where('id','=',15)->get();
        $loaisachVHVN=Loai_Sach::where('id','=',16)->get();
        return view('san_pham.index', ['DsSachTA' => $DsSachTA, 'DsSachbanchay' => $DsSachbanchay, 'DsSachTCHH' => $DsSachTCHH, 'DsSachVHVN' => $DsSachVHVN,'loaisachTA'=>$loaisachTA,
        'loaisachTCHH'=>$loaisachTCHH,'loaisachVHVN'=>$loaisachVHVN ]);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arr_chuoi = explode('-', $id);
        $_id = $arr_chuoi[count($arr_chuoi) - 1];
        $sach = Sach::find($_id);

        $tacgia = Tac_Gia::where('tac_gia.id','=',$sach->id_tac_gia)->get();
        $NXB = Nha_Xuat_Ban::where('nha_xuat_ban.id','=',$sach->id_nha_xuat_ban)->get();
      
        $loaisach = Loai_Sach::where('loai_sach.id','=',$sach->id_loai_sach)->get();
        $Dscotheyeuthich = Sach::where('id_tac_gia', '=', $sach->id_tac_gia)->where('id', '!=', $sach->id)->limit(4)->get();
        return View('san_pham.chi_tiet', ['sach' => $sach, 'Dscotheyeuthich' => $Dscotheyeuthich,'tac_gia'=>$tacgia,'NXB'=>$NXB,'loaisach'=>$loaisach]);
    }
    public function DanhMuc()
    {
        $loaisach = Loai_Sach::get();
        return view('san_pham.the_loai', ['loaisach' => $loaisach]);
    }
    public function search()
    {
        $search=$_GET['query'];
        $dssp=Sach::where('ten_sach','like','%'.$search.'%')->get();  
        return view('san_pham.search', ['dssp' => $dssp,compact('dssp')]);
    
    }
    public function SachTheoLoai($id)
    {
        $arr_chuoi = explode('-', $id);
        $_id = $arr_chuoi[count($arr_chuoi) - 1];
        $loaisach = Loai_Sach::find($_id);
        $sachtheoloai = Sach::where('id_loai_sach', '=', "$_id")->get();
        return View('san_pham.sach_theo_loai', ['sachtheoloai' => $sachtheoloai], ['loaisach' => $loaisach]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
