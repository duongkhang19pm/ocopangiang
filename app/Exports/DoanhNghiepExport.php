<?php

namespace App\Exports;

use App\Models\DoanhNghiep;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DoanhNghiepExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.doanhnghiep', [
            'doanhnghiep' =>  DoanhNghiep::where('donviquanly_id', Auth::user()->donviquanly->id)->get()
        ]);
    }
}
