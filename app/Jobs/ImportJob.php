<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Excel; //IMPORT CLASS EXCEL
use App\Imports\ProductsImport; //IMPORT CLASS PRODUCTSIMPORT

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $file;

    public function __construct($file){
        $this->file = $file; //MENERIMA PARAMETER YANG DIKIRIM
    }

    public function handle(){
        Excel::import(new ProductsImport, 'public/' . $this->file); //MENJALANKAN PROSES IMPORT
        unlink(storage_path('app/public/' . $this->file)); //MENGHAPUS FILE EXCEL YANG TELAH DI-UPLOAD
    }
}
