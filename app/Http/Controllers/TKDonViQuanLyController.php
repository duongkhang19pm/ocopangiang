<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;

class TKDonViQuanLyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome ()
    {
        return view('donviquanly.index');
    }
}
