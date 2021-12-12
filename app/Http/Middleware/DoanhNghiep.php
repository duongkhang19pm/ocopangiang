<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DoanhNghiep
{
	public function handle($request, Closure $next)
	{
		if(Auth::user()->privilege == "doanhnghiep" )
		{
			return $next($request);
		}
		return redirect()->route('403')->with('error_message', 'Người dùng không đủ quyền hạn để thao tác chức năng này!');
	}
}