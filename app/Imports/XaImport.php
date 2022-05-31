<?php

namespace App\Imports;

use App\Models\Xa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class XaImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
     {
         return new Xa([
        'huyen_id' => $row['ma_huyen'],
         'tenxa' => $row['ten_xa'],
         
         ]);
     }
}