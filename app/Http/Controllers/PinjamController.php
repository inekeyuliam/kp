<?php

namespace App\Http\Controllers;

use App\Pinjam;
use App\KategoriBuku;
use App\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PinjamController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //    $list = Pinjam::all();
    //     // $list = DB::table('kategoris')->get();
    //     return view('transaksi.peminjaman.index',['listpinjam' => $list]);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {

    //     $kategori = KategoriBuku::all();
    //     return view('transaksi.peminjaman.create',['listkat' => $kategori]);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $nama = $request->get('nama');
       
    //     $kat = new KategoriBuku();
    //     $kat->nama_kategori = $nama_kategori;
        
    //     $kat->save();
    //     return redirect('kategori');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {

    //     $kat = KategoriBuku::find($id);
    //     return view('kategori.edit', ['itemkat' => $kat ]);
   
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
       
    //     $nama = $request->get('nama_kategori');
    //     $kat = KategoriBuku::find($id);
        
    //     $kat->nama_kategori = $nama;
    //     $kat->save();
    //     return redirect('kategori');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
        
    //     $kat = KategoriBuku::find($id);
    //     $kat->delete();
    //     return redirect('kategori');
    // }
}
