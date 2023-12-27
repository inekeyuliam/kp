<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Buku;
use App\Kategori;
use App\Anggota;
use App\DetilTransaksi;
use Carbon\Carbon;

class TransaksiController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {

        $list = DetilTransaksi::all();
        return view('transaksi.peminjaman.index',['listtransaksi' => $list]);
    }
    public function getInfo($id)
    {
      $data = DB::table('anggotas')->where('kode_anggota', $id)->pluck('nama');

      return  json_encode($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = DetilTransaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "TR00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "TR0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "TR000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "TR00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "TR0".''.($lastId->id + 1);
            } else {
                    $kode = "TR".''.($lastId->id + 1);
            }
        }
        return view('transaksi.peminjaman.create', compact('kode'));
    }
    public function getAnggotaField(Request $request)
    {
        try{
            $getFields=Anggota::where('kode_anggota',$request->id)->first();
            return response()->json(['fieldanggota'=>$getFields],200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

     public function getAnggota($id)
    {
        // $buku = Buku::where('id_buku', $id)->first();
        
        $anggota = Anggota::where('kode_anggota', $id)->first();
        // return $anggota;
        if($anggota === null){
            return 'false';
        }else{
            return $anggota;
        }


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idanggota = $request->get('anggota_id');
        $idbuku = $request->get('buku_id');
        $tgl_pinjam = $request->get('tgl_pinjam');
        $tgl_batas = $request->get('tgl_batas');
        $status = 'pinjam';
        $terlambat=0;
        $kode_transaksi = $request->get('kode_transaksi');

        $trans = new DetilTransaksi();
        $trans->kode_transaksi= $kode_transaksi;
        $trans->anggota_id = $idanggota;
        $trans->buku_id = $idbuku;
        $trans->tgl_batas = $tgl_batas;
        $trans->tgl_pinjam = $tgl_pinjam;
        $trans->status = $status;
        $trans->terlambat=$terlambat;
        $trans->save();
        return redirect('pinjam');
    }
    public function getPeminjam($id){

        
        $anggota = Anggota::where('id', $id)->get();   
        // Fetch all records
        $anggotaData['data'] = $anggota;
        Response::json($anggotaData);
        // echo json_encode($anggotaData);
        exit;
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $pinjaman = DB::table('detil_transaksis')
        ->join('bukus', 'bukus.id', '=', 'detil_transaksis.buku_id')
        ->join('anggotas', 'anggotas.id', '=', 'detil_transaksis.anggota_id')
        ->join('kategori_bukus', 'kategori_bukus.id', '=', 'bukus.kategori_id')
        ->select('detil_transaksis.id','detil_transaksis.kode_transaksi','anggotas.nama','anggotas.kelas','anggotas.no_induk','anggotas.alamat','anggotas.email','anggotas.jenis_kelamin','anggotas.telepon','bukus.id',
        'bukus.judul', 'kategori_bukus.nama_kategori', 'anggotas.kode_anggota','bukus.kode_buku',
        'detil_transaksis.tgl_pinjam','detil_transaksis.tgl_batas','detil_transaksis.status', 'detil_transaksis.tgl_kembali', 'detil_transaksis.terlambat')

        // ->select('detil_transaksis.id','anggotas.nama','anggotas.no_induk','anggotas.kelas','bukus.id',
        //          'bukus.judul', 'kategori_bukus.nama_kategori',
        //          'detil_transaksis.tgl_pinjam','detil_transaksis.tgl_kembali')

        ->where('detil_transaksis.id', '=', $id)->first();



        return view('transaksi.peminjaman.show',['detilpinjam' => $pinjaman]);
    }


    public function showBuku($id)
    {
        // $buku = Buku::where('id_buku', $id)->first();
        
        if(Buku::where('kode_buku', $id)->count() > 0){
            $buku = DB::table('bukus')
            ->join('kategori_bukus', 'bukus.kategori_id', '=', 'kategori_bukus.id')
            ->select('bukus.id','bukus.judul', 
                 'kategori_bukus.nama_kategori')
            ->where('bukus.kode_buku', '=', $id)
            ->get();

            return $buku;
        }else{
            return 'false';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjaman = DetilTransaksi::find($id);
        return view('transaksi.peminjaman.edit',['detilpinjam' => $pinjaman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggota_id = $request->get('anggota_id');
        $buku_id = $request->get('idbuku');
        $tgl_pinjam = $request->get('tgl_pinjam');
        $tgl_batas = $request->get('tgl_batas');
        $tgl_kembali = $request->get('tgl_kembali');
        $status = $request->get('status');
        $kode_transaksi = $request->get('kode_transaksi');
        if($status == 'kembali')
        {
        // {
        //     $formatted_dt1=Carbon::parse($tgl_batas);
        //     $formatted_dt2=Carbon::parse($tgl_kembali);

            // $keterlambatan=$formatted_dt1->diffInDays($formatted_dt2);
            // $keterlambatan =  strtotime($tgl_kembali)->diffInDays(strtotime($tgl_batas));
            // $keterlambatan->format('%a');

            // $date1 = "2007-03-24";
            // $date2 = "2009-06-26";

            $diff = (strtotime($tgl_kembali) - strtotime($tgl_batas));

            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $keterlambatan = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            // printf("%d years, %d months, %d days\n", $years, $months, $days);
        }
        else{
            $keterlambatan = 0;
        }
    
        $datatransaksi = DetilTransaksi::find($id);
        $datatransaksi->anggota_id = $anggota_id;
        $datatransaksi->buku_id = $buku_id;
        $datatransaksi->tgl_pinjam = $tgl_pinjam;
        $datatransaksi->tgl_batas = $tgl_batas;
        $datatransaksi->tgl_kembali = $tgl_kembali;
        $datatransaksi->kode_transaksi = $kode_transaksi;
        $datatransaksi->status = $status;
        $datatransaksi->terlambat = $keterlambatan;
        $datatransaksi->save();
        return redirect('pinjam');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function search(Request $request)
    {   
        $search = $request->get('search');
        $detil = DB::table('detil_transaksis')
        ->where('kode_transaksi', 'like', '%'.$search.'%')
             ->orderBy('id', 'desc')
             ->get();
        return view('transaksi.peminjaman.index',['listtransaksi' => $detil]);
    }
    public function ubahstatus(Request $request, $id)
    {   
        $status = $request->get('status');
        $detil = DetilTransaksi::find($id);
        $detil->status=$status;
        $detil->save();
        return view('transaksi.peminjaman.index');
    }

}
