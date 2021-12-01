<?php

namespace App\Imports;

use App\Models\Huyen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HuyenImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
     {
         return new Huyen([
        'tinh_id' => $row['ma_tinh'],
         'tenhuyen' => $row['ten_huyen'],
         
         ]);
     }
}
