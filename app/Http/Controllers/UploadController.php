<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    public function doUpload(Request $request)
    {
    	$file 		= $request->file('file_yang_di_upload');
    	$this->filename = $file->getClientOriginalName();

 		Excel::load($file, function($reader) { 
 			$items = $reader->setDateFormat('m/d/Y')->get();
            foreach ($items as $item => $inputs) {
                $data_yang_di_upload = new Barang();
                $data_yang_di_upload->filename     = $this->filename;
                $data_yang_di_upload->nama         = $inputs['nama'];
                $data_yang_di_upload->nama_barang  = $inputs['nama_barang'];
                $data_yang_di_upload->jumlah       = $inputs['jumlah'];	
                $data_yang_di_upload->save();
            }
 		});
        return redirect()->back();
    }
}
