<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use DB;
use Excel;
class ImportAnggotaController extends Controller
{
    function index()
    {
     $data = DB::table('anggotas')->orderBy('id', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
        foreach ($data->toArray() as $key => $value) 
        {
            foreach ($value as $row_key => $row) 
            {
                $insert_data[] = array(
                'kode_anggota'  => $row[0],
                'no_induk'   => $row[1],
                'nama'   => $row[2],
                'tanggal'    => $row[3],
                'kelas'  => $row[4],
                'jenis_kelamin'   => $row[5],
                'email'   => $row[6],
                'telepon'    => $row[7],
                'alamat'  => $row[8]
                );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('anggotas')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
}
