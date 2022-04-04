<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DonViQuanLy
{
	public function handle($request, Closure $next)
	{
		if(Auth::user()->privilege == "donviquanly" && Auth::user()->kichhoat == 0)
		{
			return $next($request);
		}
		if(Auth::user()->privilege == "donviquanly" && Auth::user()->kichhoat == 1)
		{
			Auth::logout();
			return redirect()->route('403')->with('error_message', 'Tài khoản của bạn đã bị tạm khóa. Vui lòng liên hệ quản trị viên');
		}
		return redirect()->route('403')->with('error_message', 'Người dùng không đủ quyền hạn để thao tác chức năng này!');
	}
}