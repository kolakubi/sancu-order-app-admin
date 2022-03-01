<?php

namespace App\Imports;

// use App\Models\Stok;
// use Maatwebsite\Excel\Concerns\ToModel;

// class StokImport implements ToModel
// {
//     /**
//     * @param array $row
//     *
//     * @return \Illuminate\Database\Eloquent\Model|null
//     */
//     public function model(array $row)
//     {
//         dd($row);
//         return new Stok([
//             //
//         ]);
//     }
// }

use App\Models\Stok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StokImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        dd($rows);
        foreach ($rows as $row) 
        {
            dd($row);

            // User::create([
            //     'name' => $row[0],
            // ]);
        }
    }
}