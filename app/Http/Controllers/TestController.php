<?php

namespace App\Http\Controllers;

use App\Jobs\SenMailjob;
use App\Models\ChucNang;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function view()
    {
        return view('mail.view_sen_mail');
    }
    public function sendMail(Request $request)
    {
        $ds_mail=explode(";",$request->list_mail);//1 mảnh email hàm explode dùng để tách các eamil thông qua dấu chấm phẩy
        foreach($ds_mail as $k=>$v){
            $xxx['noi_dung']=$request->noi_dung;
            $xxx['tieu_de']=$request->tieu_de;

            SenMailjob::dispatch($v,$request->tieu_de,'mail.doi_no',$xxx);
      //SenMailjob dùng để gửi nhanh tin nhắn đến các email
        }

    }
    public function mail_1()
    {
        return view('mail.kich_hoat');
    }

    public function mail_2()
    {
        return view('mail.quen_mat_khau');
    }

    public function mail_3()
    {
        return view('mail.dat_ve');
    }


    public function demo()
    {
        return view('admin.page.phan_quyen.index');
    }

    public function dataDemo(Request $request)
    {
        $data   = ChucNang::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function index()
    {
        return view('admin.page.lich_chieu.index');
    }

    public function create()
    {
        // Tạo session tên là s_1 có giá trị là dzfullstack
        // Session::start();
        Session::put('s_1', 'dzfullstack');
        Session::put('s_2', 'quoclongdn222g@gmail.com');
        Session::save();
        // Tạo cookie tên là c_1 có giá trị 32 Xuân Diệu
        // Vì cookie lưu ở client (trình duyệt) cho nên chúng ta phải return respone

        return response('x')->withCookie(Cookie('c_1', '32 Xuân Diệu', 1440));
    }

    public function read(Request $request)
    {
        // Lấy giá trị s_1 của session. Không cần Request vì Session nó được lưu ở Server
        $value        =   Session::get('auth');
        dd($value);
    }
}
