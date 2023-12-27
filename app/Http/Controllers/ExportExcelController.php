<?php

namespace App\Http\Controllers;
use App\Anggota;
use Illuminate\Http\Request;
use DB;
use Excel;
use PHPExcel_Style_Alignment;

class ExportExcelController extends Controller
{
    public function index()
    {
        
        $list = Anggota::all();
        return view('export_excel',['listanggota' => $list]);
    }
  
    function excel()
    {
     $customer_data = DB::table('anggotas')->get()->toArray();
     $book_data = DB::table('bukus')->get()->toArray();
     $kategori_data = DB::table('kategori_bukus')->get()->toArray();
     $transaksi_data = DB::table('detil_transaksis')->get()->toArray();
     $penerbit_data = DB::table('penerbit_bukus')->get()->toArray();
     $penulis_data = DB::table('penulis_buku')->get()->toArray();
     $pinjam_data = DB::table('detil_transaksis')->where('status','pinjam')->get()->toArray();
     $kembali_data = DB::table('detil_transaksis')->where('status','kembali')->get()->toArray();
     $denda_data = DB::table('dendas')->get()->toArray();
     $sudah_data = DB::table('dendas')->where('status','lunas')->get()->toArray();
     $belum_data = DB::table('dendas')->where('status','belum')->get()->toArray();

     $customer_array[] = array('ID Anggota','Kode Anggota', 'No Induk', 'Tgl Pendaftaran', 'Nama', 'Kelas','Jenis Kelamin', 'Email','Telepon','Alamat', 'Created_at', 'Updated_at');
     $book_array[] = array('ID Buku','ID Kategori', 'Judul', 'Penulis', 'Penerbit', 'ISBN','Tahun Terbit', 'Quantity', 'Created_at', 'Updated_at');
     $kategori_array[] = array('ID Kategori', 'Kode Kategori', 'Nama Kategori', 'Created_at', 'Updated_at');
     $transaksi_array[] = array('Kode Transaksi', 'ID Anggota', 'ID Buku', 'Tgl Pinjam', 'Tgl Batas', 'Tgl Kembali', 'Terlambat', 'Status', 'Created_at', 'Updated_at');
     $penerbit_array[] = array('ID Penerbit', 'Nama Penerbit', 'Created_at', 'Updated_at');
     $penulis_array[] = array('ID Penulis', 'Nama Penulis', 'Created_at', 'Updated_at');
     $pinjam_array[] = array('Kode Transaksi', 'ID Anggota', 'ID Buku', 'Tgl Pinjam', 'Tgl Batas', 'Tgl Kembali', 'Terlambat', 'Status', 'Created_at', 'Updated_at');
     $kembali_array[] = array('Kode Transaksi', 'ID Anggota', 'ID Buku', 'Tgl Pinjam', 'Tgl Batas', 'Tgl Kembali', 'Terlambat', 'Status', 'Created_at', 'Updated_at');
     $denda_array[] = array('Kode Denda', 'Denda','Status Pembayaran','Created_at', 'Updated_at');
     $sudah_array[] = array('Kode Denda', 'Denda','Status Pembayaran','Created_at', 'Updated_at');
     $belum_array[] = array('Kode Denda', 'Denda','Status Pembayaran','Created_at', 'Updated_at');


     foreach($customer_data as $customer)
     {
      $customer_array[] = array(
       'ID Anggota'     => $customer->id,
       'Kode Anggota'  => $customer->kode_anggota,
       'No Induk'   => $customer->no_induk,
       'Tgl Pendaftaran'    => $customer->tanggal,
       'Nama'  => $customer->nama,
       'Kelas'   => $customer->kelas,
       'Jenis Kelamin'  => $customer->jenis_kelamin,
       'Email'   => $customer->email,
       'Telepon'    => $customer->telepon,
       'Alamat'  => $customer->alamat,
       'Created_at'   =>$customer->created_at,
       'Updated_at'   =>$customer->updated_at

      );
     }

     foreach($book_data as $book)
     {
      $book_array[] = array(
       'ID Buku'    =>$book->id,
       'ID Kategori'  => $book->kategori_id,
       'Judul'   => $book->judul,
       'ID Penulis'    => $book->penulis_id,
       'ID Penerbit'  => $book->penerbit_id,
       'ISBN'   => $book->ISBN,
       'Tahun Terbit'  => $book->tahun_terbit,
       'Quantity'   => $book->quantity,
       'Created_at'   =>$book->created_at,
       'Updated_at'   =>$book->updated_at
      );
     }

     foreach($kategori_data as $kategori)
     {
      $kategori_array[] = array(
       'ID Kategori'  => $kategori->id,
       'Kode Kategori'   => $kategori->kode_kategori,
       'Nama Kategori'    => $kategori->nama_kategori,
       'Created_at'   =>$customer->created_at,
       'Updated_at'   =>$customer->updated_at
      );
     }
     foreach($penerbit_data as $penerbit)
     {
      $penerbit_array[] = array(
       'ID Penerbit'  => $penerbit->id,
       'Nama Penerbit'   => $penerbit->nama_penerbit,
       'Created_at'   =>$penerbit->created_at,
       'Updated_at'   =>$penerbit->updated_at
      );
     }
     foreach($penulis_data as $penulis)
     {
      $penulis_array[] = array(
       'ID Penulis'  => $penulis->id,
       'Nama Penulis'   => $penulis->nama_penulis,
       'Created_at'   =>$penulis->created_at,
       'Updated_at'   =>$penulis->updated_at
      );
     }
     foreach($transaksi_data as $transaksi)
     {
      $transaksi_array[] = array(
       'Kode Transaksi'  => $transaksi->kode_transaksi,
       'ID Anggota'   => $transaksi->anggota_id,
       'ID Buku'    => $transaksi->buku_id,
       'Tgl Pinjam'  => $transaksi->tgl_pinjam,
       'Tgl Batas'   => $transaksi->tgl_batas,
       'Tgl Kembali'    => $transaksi->tgl_kembali,
       'Terlambat'  => $transaksi->terlambat,
       'Status'   => $transaksi->status,
       'Created_at'   =>$transaksi->created_at,
       'Updated_at'   =>$transaksi->updated_at
      );
     }

     foreach($pinjam_data as $pinjam)
     {
      $pinjam_array[] = array(
       'Kode Transaksi'  => $pinjam->kode_transaksi,
       'ID Anggota'   => $pinjam->anggota_id,
       'ID Buku'    => $pinjam->buku_id,
       'Tgl Pinjam'  => $pinjam->tgl_pinjam,
       'Tgl Batas'   => $pinjam->tgl_batas,
       'Tgl Kembali'    => $pinjam->tgl_kembali,
       'Terlambat'  => $pinjam->terlambat,
       'Status'   => $pinjam->status,
       'Created_at'   =>$pinjam->created_at,
       'Updated_at'   =>$pinjam->updated_at
      );
     }
     foreach($kembali_data as $kembali)
     {
      $kembali_array[] = array(
       'Kode Transaksi'  => $kembali->kode_transaksi,
       'ID Anggota'   => $kembali->anggota_id,
       'ID Buku'    => $kembali->buku_id,
       'Tgl Pinjam'  => $kembali->tgl_pinjam,
       'Tgl Batas'   => $kembali->tgl_batas,
       'Tgl Kembali'    => $kembali->tgl_kembali,
       'Terlambat'  => $kembali->terlambat,
       'Status'   => $kembali->status,
       'Created_at'   =>$kembali->created_at,
       'Updated_at'   =>$kembali->updated_at
      );
     }
     foreach($denda_data as $denda)
     {
      $denda_array[] = array(
       'Kode Denda'    => $denda->kode_denda,
       'Denda'  => $denda->status,
       'Status Pembayaran'   => $denda->status,
       'Created_at'   =>$kembali->created_at,
       'Updated_at'   =>$kembali->updated_at
      );
     }
     foreach($sudah_data as $sudah)
     {
      $sudah_array[] = array(
       'Kode Denda'    => $sudah->kode_denda,
       'Denda'  => $sudah->status,
       'Status Pembayaran'   => $sudah->status,
       'Created_at'   =>$sudah->created_at,
       'Updated_at'   =>$sudah->updated_at
      );
     }
     foreach($belum_data as $belum)
     {
      $belum_array[] = array(
       'Kode Denda'    => $belum->kode_denda,
       'Denda'  => $belum->status,
       'Status Pembayaran'   => $belum->status,
       'Created_at'   =>$belum->created_at,
       'Updated_at'   =>$belum->updated_at
      );
     }
     $name ='Laporan Perpustakaan '.date('Y-m-d_H-i-s');

     Excel::create($name, function($excel) use ($customer_array, $book_array, $kategori_array, $penulis_array, $transaksi_array, $pinjam_array,$penerbit_array, $kembali_array , $denda_array, $sudah_array, $belum_array){
      $excel->setTitle('Anggota Data');

      // first sheet
      $excel->sheet('Data Anggota', function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
       $sheet->getStyle('A1:L1')->applyFromArray(array(
        'font' => array(
          'name'      =>  'Calibri',
          'size'      =>  12,
          'align'     => 'center',
          'bold'      =>  true

            )
        ));
        $style = array(
          'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          )
      );
  
      $sheet->getStyle("A1:L1")->applyFromArray($style);
      });

      // second sheet
      $excel->sheet('Data Buku', function($sheet) use ($book_array){
        $sheet->fromArray($book_array, null, 'A1', false, false);
        $sheet->getStyle('A1:J1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $sheet->getStyle("A1:J1")->applyFromArray($style);
       });

      // third sheet
      $excel->sheet('Data Kategori', function($sheet) use ($kategori_array){
        $sheet->fromArray($kategori_array, null, 'A1', false, false);
        $sheet->getStyle('A1:E1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $sheet->getStyle("A1:E1")->applyFromArray($style);
      });

      // fourth sheet
      $excel->sheet('Data Penerbit', function($sheet) use ($penerbit_array){
        $sheet->fromArray($penerbit_array, null, 'A1', false, false);
        $sheet->getStyle('A1:D1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $sheet->getStyle("A1:D1")->applyFromArray($style);
      });

      $excel->sheet('Data Penulis', function($sheet) use ($penulis_array){
        $sheet->fromArray($penulis_array, null, 'A1', false, false);
        $sheet->getStyle('A1:D1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $sheet->getStyle("A1:D1")->applyFromArray($style);
      });
      // fifth sheet
      $excel->sheet('Data Transaksi', function($sheet) use ($transaksi_array){
        $sheet->fromArray($transaksi_array, null, 'A1', false, false);
        $sheet->getStyle('A1:J1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $sheet->getStyle("A1:J1")->applyFromArray($style);
      });

      $excel->sheet('Data Buku Dipinjam', function($sheet) use ($pinjam_array){
        $sheet->fromArray($pinjam_array, null, 'A1', false, false);
        $sheet->getStyle('A1:J1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $sheet->getStyle("A1:J1")->applyFromArray($style);
      });

      $excel->sheet('Data Buku Sudah Dikembalikan', function($sheet) use ($kembali_array){
        $sheet->fromArray($kembali_array, null, 'A1', false, false);
        $sheet->getStyle('A1:J1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $sheet->getStyle("A1:J1")->applyFromArray($style);
      });

      $excel->sheet('Data Denda', function($sheet) use ($denda_array){
        $sheet->fromArray($denda_array, null, 'A1', false, false);
        $sheet->getStyle('A1:E1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );

        $sheet->getStyle("A1:E1")->applyFromArray($style);
      });

      $excel->sheet('Data Denda lunas', function($sheet) use ($sudah_array){
        $sheet->fromArray($sudah_array, null, 'A1', false, false);
        $sheet->getStyle('A1:E1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );

        $sheet->getStyle("A1:E1")->applyFromArray($style);
      });
      $excel->sheet('Data Denda belum dibayar', function($sheet) use ($belum_array){
        $sheet->fromArray($belum_array, null, 'A1', false, false);
        $sheet->getStyle('A1:E1')->applyFromArray(array(
          'font' => array(
            'name'      =>  'Calibri',
            'size'      =>  12,
            'align'     => 'center',
            'bold'      =>  true
  
              )
          ));
          $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );

        $sheet->getStyle("A1:E1")->applyFromArray($style);
      });
     })->download('xlsx');
    }
}
