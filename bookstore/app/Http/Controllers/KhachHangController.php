<?php

namespace App\Http\Controllers;

use App\Mail\BookStoreMail;
use App\Models\Khach_Hang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('san_pham.index');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = Khach_Hang::where('google_id', $user->id)->first();
            
            $request->session()->put('khach-hang',$finduser);
            
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/');
     
            }else{
                $newUser = Khach_Hang::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/');
            }
    
        } 
        catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function Login(Request $request)
    {
        if ($request->session()->has('khach-hang')) {
            return redirect('/')->with('alert', 'Bạn Đã Đăng Nhập');
        } else
            return view('khach_hang.login');
    }
    public function Register()
    {
        return view('khach_hang.register');
    }
    public function PostLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',

        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $kh = Khach_Hang::where(['password' =>  md5($password), 'email' => $email])->first();
        if ($kh) {
            $request->session()->put('khach-hang', $kh);
            return redirect('/');
        } else

            return redirect()->back()->with('alert', 'Đăng nhập không thành công');
    }
    public function Logout(Request $request)
    {
        if ($request->session()->has('khach-hang')) {
            $request->session()->forget('khach-hang');
            return redirect('/')->with('alert', 'Bạn Đã Đăng Xuất');
        } else
            return redirect('/')->with('alert', 'Bạn Chưa Đăng Nhập');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khach_hang = Session::get('khach-hang');
        return view('khach_hang.thong_tin_don_hang', ['khach_hang' => $khach_hang]);
    }

    public function DonHang(Request $request)
    {

        $id_khach_hang = Session::get('khach-hang')->id;
        $id = DB::table('don_hang')->insertGetId(
            ['tong_tien' => str_replace(',', '', Cart::subtotal()), 'ngay_dat' => date('Y-m-d H:m:s'), 'id_khach_hang' => $id_khach_hang, 'tinh_trang' => 0, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')]
        );
        $khach_hang = DB::table('khach_hang')->where('id', '=', $id_khach_hang)->update(['name'=> $request->ten_kh, 'dia_chi' => $request->dia_chi, 'phone' => $request->sdt]);
        $dsMH = array();
        foreach (Cart::content() as $row) {
            $dsMH[] = array('id_don_hang' => $id, 'id_sach' => $row->id, 'so_luong' => $row->qty, 'don_gia' => $row->price, 'thanh_tien' => str_replace(',', '', Cart::total()), 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'));
        }
        DB::table('chi_tiet_don_hang')->insert($dsMH);
        Cart::destroy();
        return redirect('khach-hang/don-dat-hang/' . $id);
    }
    public function ChiTietDonDatHang($id)
    {
        $DonDatHang = DB::table('don_hang')
            ->join('khach_hang', 'khach_hang.id', '=', 'don_hang.id_khach_hang')
            ->join('chi_tiet_don_hang', 'don_hang.id', '=', 'chi_tiet_don_hang.id_don_hang')
            ->join('sach', 'sach.id', '=', 'chi_tiet_don_hang.id_sach')
            ->select('don_hang.id', 'don_hang.ngay_dat', 'don_hang.id_khach_hang', 'don_hang.tong_tien', 'khach_hang.name', 'khach_hang.dia_chi', 'khach_hang.phone', 'khach_hang.email', 'chi_tiet_don_hang.so_luong', 'chi_tiet_don_hang.don_gia', 'sach.id as MaSP', 'sach.ten_sach', 'sach.hinh')
            ->where('don_hang.id', $id)
            ->get();
        if (count($DonDatHang) === 0)
            return redirect("/");
        Mail::to($DonDatHang[0]->email)->send(new BookStoreMail($DonDatHang));
        return view('khach_hang.don_dat_hang', ['DonDatHang' => $DonDatHang]);
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);

        if (isset($_POST['submit'])) {
            $pass = $_POST['password'];
            $passconfirm = $_POST['confirm_password'];
            if ($pass != $passconfirm) {
                redirect()->back()->with('alert', 'Mật Khẩu Xác Nhận Không Trùng');
            }
        }

        $data = $request->all();
        $khach_hang = new Khach_Hang();
        $khach_hang->name = $data['name'];
        $khach_hang->email = $data['email'];
        $khach_hang->password =  md5($data['password']);
        $khach_hang->phone = $data['phone'];
        $khach_hang->dia_chi = $data['dia_chi'];
        $result = $khach_hang->save();

        if ($result)
            return redirect('khach-hang/dang-nhap')->with('alert', 'Đăng ký  thành công');
        else
            return redirect('khach-hang/dang-ky')->with('alert', 'Đăng ký không thành công');
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
        $khachhang = Khach_Hang::find($id);
        return view('admin.cap-nhat-tk', ['khachhang' => $khachhang]);
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

        $khachhang = Khach_Hang::find($id);
        $data = $request->all();
        $khachhang->ho_khach_hang = $data['ho_khach_hang'];
        $khachhang->ten_khach_hang = $data['ten_khach_hang'];
        $khachhang->email = $data['email'];
        $khachhang->dia_chi = $data['dia_chi'];
        $khachhang->sdt = $data['sdt'];

        $result = $khachhang->save();
        if ($result)
            return redirect('admin/ds-kh')->with('alert', 'Cập nhập thành công');
        else
            return redirect('admin/cap-nhat-tk')->with('alert', 'Cập nhập không thành công');
    }
    public function edit_kh_vip($id)
    {
        $khachhang = Khach_Hang::find($id);
        return view('admin.cap-nhat-tk-vip', ['khachhang' => $khachhang]);
    }
    public function update_kh_vip(Request $request, $id)
    {
        $khachhang = Khach_Hang::find($id);
        $data = $request->all();
        $khachhang->ho_khach_hang = $data['ho_khach_hang'];
        $khachhang->ten_khach_hang = $data['ten_khach_hang'];
        $khachhang->email = $data['email'];
        $khachhang->dia_chi = $data['dia_chi'];
        $khachhang->sdt = $data['sdt'];

        $result = $khachhang->save();
        if ($result)
            return redirect('admin/ds-kh-vip')->with('alert', 'Cập nhập thành công');
        else
            return redirect('admin/cap-nhat-tk-vip')->with('alert', 'Cập nhập không thành công');
    }
    public function destroy($id)
    {
        $khachhang = Khach_Hang::find($id);
        $khachhang->delete();
        return redirect('admin/ds-kh')->with('alert', 'Xoá thành công');
    }
    public function xoa_tk_vip($id)
    {
        $khachhang = Khach_Hang::find($id);
        $khachhang->delete();
        return redirect('admin/ds-kh-vip')->with('alert', 'Xoá thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ThemVaoGioHang(Request $request, $id)
    {

        $sach = DB::table('sach')->where('id', $id)->first();
        if ($sach == null)
            echo json_encode(array('n' => "0"));
        else {
            Cart::add($sach->id, $sach->ten_sach, $request->SoLuong, $sach->don_gia, ['hinh' => $sach->hinh]);
            echo json_encode(array('n' => Cart::count()));
        }
    }
    public function ThongTinGioHang()
    {
        return view('khach_hang.thong_tin_gio_hang');
    }
    public function CapNhatGioHang(Request $request)
    {
        $rowID = $request->Th_rowID;
        $soLuong = $request->Th_soluong * 1;
        Cart::update($rowID, $soLuong);
        return redirect('khach-hang/thong-tin-gio-hang');
    }
    public function XoaMatHang($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
    public function TienHanhDatHang(Request $request)
    {
        if ($request->session()->has('khach-hang')) {
            return redirect('khach-hang/thong-tin-khach-hang');
        } else
            return redirect('khach-hang/dang-nhap');
    }
}
