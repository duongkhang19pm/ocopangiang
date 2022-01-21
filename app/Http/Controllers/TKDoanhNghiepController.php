<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TKDoanhNghiepController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome ()
    {
        if( Auth::user()->kichhoat === 0  )
        {
            return view('doanhnghiep.index');
        }
         elseif(Auth::user()->kichhoat === 1)
        {
            Auth::logout();
            return redirect()->route('login')->with('warning', 'Tài khoản của bạn đã bị tạm khóa. Vui lòng liên hệ quản trị viên');
        }
    }
}
