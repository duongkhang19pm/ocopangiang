<?php

namespace App\Imports;

use App\Models\Tinh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class TinhImport implements ToModel,WithHeadingRow
{
     public function model(array $row)
     {
  
         return new Tinh([
         'tentinh' => $row['ten_tinh'],
         
         ]);
     }
}
