<?php

namespace App\Exports;

use App\Models\DonViQuanLy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;



class DonViQuanLyExport implements FromView
{
   public function view(): View
    {
        return view('exports.donviquanly', [
            'donviquanly' =>  DonViQuanLy::all()
        ]);
    }
 }

