<?php

namespace App\Imports;

use App\Models\Tinh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TinhImport implements ToModel,WithHeadingRow
{
     public function model(array $row)
     {
        $tinh= Tinh::where('tentinh', $row['ten_tinh'])->first();
        
        if(empty($tinh))
        {
            $tinh = Tinh::create([
                'tentinh' => $row['ten_tinh'],
            ]);
            return $tinh;
        }
        else
        {
            $orm = Tinh::find($tinh->id);
            $orm->tentinh = $row['ten_tinh'];
            return $orm;
        }
        
     }
}
