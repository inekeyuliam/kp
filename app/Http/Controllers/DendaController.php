<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DetilTransaksi;
use App\Denda;
class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kembali =  Denda::all();
        return view('denda.index',['listdenda' => $kembali]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kembali = DetilTransaksi::all()->where('status','=','kembali');
        $getRow = Denda::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "DN00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "DN0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "DN000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "DN00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "DN0".''.($lastId->id + 1);
            } else {
                    $kode = "DN".''.($lastId->id + 1);
            }
        }
        return view('denda.create', ['kode' => $kode, '$listdata' => $kembali]);
    }
    public function getTransaksi($id)
    {
        // $buku = Buku::where('id_buku', $id)->first();
        
        $detil = DetilTransaksi::where('kode_transaksi', $id)->first();
        // return $anggota;
        if($detil === null){
            return 'false';
        }else{
            return $detil;
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
        $kode_denda = $request->get('kode_denda');
        $detil_transaksi_id = $request->get('detil_transaksi_id');
        $terlambat = $request->get('terlambat');
        $denda = 1000 * $terlambat;
        $status = $request->get('status');

        $den = new Denda();
        $den->kode_denda= $kode_denda;
        $den->detil_transaksi_id = $detil_transaksi_id;
        $den->denda = $denda;
        $den->status = $status;

        $den->save();
        return redirect('denda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $denda = Denda::find($id);
        return view('denda.show',['itemdenda' => $denda]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $denda = Denda::find($id);
        return view('denda.edit', ['itemdenda' => $denda ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kode_denda = $request->get('kode_denda');
        $detil_transaksi_id = $request->get('detil_transaksi_id');
        $terlambat = $request->get('terlambat');
        $denda = 1000 * $terlambat;
        $status = $request->get('status');

        $den = new Denda();
        $den->kode_denda= $kode_denda;
        $den->detil_transaksi_id = $detil_transaksi_id;
        $den->denda = $denda;
        $den->status = $status;

        $den->save();
        return redirect('denda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $angg = Denda::find($id);
        $angg->delete();
        return redirect('denda');    }
}
