<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Loai_Sach;
use App\Models\Nha_Xuat_Ban;
use App\Models\Sach;
use App\Models\Tac_Gia;
use App\Models\Khach_Hang;
use App\Models\Don_hang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ThongKeSanPhamTheoLoai = DB::table('loai_sach')
            ->join('sach', 'sach.id_loai_sach', '=', 'loai_sach.id')
            ->select(DB::raw('sach.id_loai_sach,ten_loai_sach,count(sach.id) as TSSP'))
            ->groupBy('sach.id_loai_sach', 'ten_loai_sach')->get();
            return view('admin.index', ['ThongKeSanPhamTheoLoai' => $ThongKeSanPhamTheoLoai]);
    }
    public function Login()
    {
        return View('admin.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'dienthoai' => 'required',

        ]);
        $email = $request->input('email');
        $dienthoai = $request->input('dienthoai');
        $kh = Admin::where(['dien_thoai' => $dienthoai, 'email' => $email])->first();
        if ($kh) {
            $request->session()->put('admin', $kh);
            return redirect('/admin/Home');
        } else
            return redirect()->back()->with('alert', 'Đăng nhập không thành công');
    }
    public function Logout(Request $request)
    {
        if ($request->session()->has('admin')) {
            $request->session()->forget('admin');
            return redirect('/admin')->with('alert', 'Bạn Đã Đăng Xuất');
        } else
            return redirect('/admin')->with('alert', 'Bạn Chưa Đăng Nhập');
    }
    public function Kho_sach()
    {
        $dssach = Sach::Paginate(12);
        return view('admin.kho-sach', ['dssach' => $dssach]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsLoaiSach = Loai_Sach::get();
        $TG = Tac_Gia::get();
        $NXB = Nha_Xuat_Ban::get();
        return view('admin.them-sach', ['dsLoaiSach' => $dsLoaiSach, 'NXB' => $NXB, 'TG' => $TG]);
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
            'ten_sach' => 'required',
            'ten_url'=>'required',
            'don_gia' => 'required',
            'gioi_thieu' => 'required',
            'ma_loai' => 'required',
            'ma_nha_xuat_ban' => 'required',

            'hinh' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $name_hinh = '';
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name_hinh = $file->getClientOriginalName();
                $file->move('storage/css_js_image_bookstore/hinh_sach', $name_hinh);
            }
        }
        $data = $request->all();
        $sach = new Sach();
        $sach->ten_sach = $data['ten_sach'];
        $sach->ten_url = $data['ten_url'];
        $sach->id_loai_sach = $data['ma_loai'];
        $sach->id_nha_xuat_ban = $data['ma_nha_xuat_ban'];
        $sach->id_tac_gia = $data['ma_tac_gia'];
        $sach->ngay_xuat_ban =  $data['ngay_xuat_ban'];;
        $sach->hinh = $name_hinh;
        $sach->don_gia = $data['don_gia'];
        $sach->gioi_thieu = $data['gioi_thieu'];
        $sach->trang_thai = isset($data['trang_thai']) ? $data['trang_thai'] : 0;

        $result = $sach->save();
        if ($result)
            return redirect('admin/kho-sach')->with('alert', 'Thêm thành công');
        else
            return redirect('admin/them-sach')->with('alert', 'Thêm không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sach = Sach::find($id);
        $dsLoaiSach = Loai_Sach::get();
        $NXB = Nha_Xuat_Ban::get();
        $TG = Tac_Gia::get();
        return view('admin.cap-nhat', ['dsLoaiSach' => $dsLoaiSach, 'sach' => $sach, 'TG' => $TG, 'NXB' => $NXB]);
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
        $sach = Sach::find($id);
        $name_hinh = '';
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name_hinh = $file->getClientOriginalName();
                $file->move('storage/css_js_image_bookstore/hinh_sach', $name_hinh);
            }
        }

        $data = $request->all();

        $sach->ten_sach = $data['ten_sach'];
        
        $sach->id_loai_sach = $data['ma_loai'];
        $sach->id_nha_xuat_ban = $data['ma_nha_xuat_ban'];
        $sach->id_tac_gia = $data['ma_tac_gia'];
        $sach->ngay_xuat_ban =  $data['ngay_xuat_ban'];;
        $sach->hinh = $name_hinh;
        $sach->don_gia = $data['don_gia'];
        $sach->gioi_thieu = $data['gioi_thieu'];
        $sach->trang_thai = isset($data['trang_thai']) ? $data['trang_thai'] : 0;

        $result = $sach->save();
        if ($result)
            return redirect('admin/kho-sach')->with('alert', 'Cập nhật thành công');
        else
            return redirect('admin/cap-nhat')->with('alert', 'Cập nhật không thành công');
    }
    public function DsTG()
    {
       
        $dsTacGia=Tac_Gia::Paginate(12);
        return view('admin.ds-tg', ['dsTacGia' => $dsTacGia]);
    }
    public function DsNXB()
    {
        $NXB = Nha_Xuat_Ban::Paginate(12);
        return view('admin.ds-nxb', ['NXB' => $NXB]);
    }
    public function DS_khach_hang_vip()
    {
       if( $khach_hang_vip = Khach_Hang::where('thanh_vien','=',1)->Paginate(12))
       {
        return view('admin.ds-khach-hang-vip', ['khach_hang_vip'=>$khach_hang_vip]);
        }
       
        
    }
    public function DS_khach_hang()
    {   
        
        if( $khach_hang = Khach_Hang::Paginate(12)){

            return view('admin.ds-khach-hang', ['khach_hang'=>$khach_hang]);
            
           }
    }
    public function DS_Don_Hang()
    {   
        
        $don_hang=Don_hang::Paginate(12);
        return view('admin.ds-don-hang', ['don_hang' => $don_hang]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach = Sach::find($id);
        $sach->delete();
        return redirect('admin/kho-sach')->with('alert', 'Xoá thành công');
    }
    
    
}