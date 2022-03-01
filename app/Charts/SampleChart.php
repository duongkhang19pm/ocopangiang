<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TinhTrang;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\SanPham;
use App\Models\DoanhNghiep;
class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        

        $donhang_chitiet = DonHang_ChiTiet::where('tinhtrang_id',10)->get();
     
      
            $tongtien = 0;
            $ngay = '';
            foreach($donhang_chitiet as $value)
                {
                  
                     
                    if(!empty($value->sanpham_id))
                    {
                       
                            $tongtien = $value->dongiaban;
                            $ngay = $value->created_at->format('d/m/Y H:i:s');
                        
                    }
                    return Chartisan::build()
                    ->labels([$value->SanPham->tensanpham,$value->SanPham->tensanpham,$value->SanPham->tensanpham ])
                    ->dataset($value->SanPham->tensanpham, [$tongtien,$tongtien + 1,$tongtien *2]);  
                    
                                    
                }  
                
                
                
            

        
        
       
    }
}