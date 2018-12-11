<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI
// use Illuminate\Contracts\Queue\ShouldQueue; //IMPORT SHOUDLQUEUE
// use Maatwebsite\Excel\Concerns\WithChunkReading; //IMPORT CHUNK READING


// tanpa menggunakan heading pada file excel
//class ProductsImport implements ToModel
// tanpa menggunakan heading pada file excel

class ProductsImport implements ToModel, WithHeadingRow{

    public function model(array $row){

      // tanpa menggunakan heading pada file excel
        // return new Product([
        //     //
        //     'title' => $row[0],
        //     'slug' => str_slug($row[0]),
        //     'description' => $row[1],
        //     'price' => $row[2],
        //     'stock' => $row[3]
        // ]);
      // tanpa menggunakan heading pada file excel

        return new Product([
            'title' => $row['title'],
            'slug' => str_slug($row['title']),
            'description' => $row['description'],
            'price' => $row['price'],
            'stock' => $row['stock']
        ]);
    }

    // LIMIT CHUNKSIZE
    // public function chunkSize(): int
    // {
    //     return 200; //ANGKA TERSEBUT PERTANDA JUMLAH BARIS YANG AKAN DIEKSEKUSI
    // }

}
