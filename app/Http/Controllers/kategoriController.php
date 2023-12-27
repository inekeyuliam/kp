<?php

namespace App\Http\Controllers;

use DB;
use App\KategoriBuku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $list = KategoriBuku::all();
        // $list = DB::table('kategoris')->get();
        return view('kategori.index',['listkategori' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = KategoriBuku::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "K00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "K0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "K000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "K00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "K0".''.($lastId->id + 1);
            } else {
                    $kode = "K".''.($lastId->id + 1);
            }
        }
        return view('kategori.create',compact('kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_kategori = $request->get('nama_kategori');
        $kode_kategori = $request->get('kode_kategori');


        $kat = new KategoriBuku();
        $kat->nama_kategori = $nama_kategori;
        $kat->kode_kategori = $kode_kategori;
        $kat->save();
        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $kat = KategoriBuku::find($id);
        return view('kategori.edit', ['itemkat' => $kat ]);
   
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
       
        $nama = $request->get('nama_kategori');
        $kat = KategoriBuku::find($id);
        
        $kat->nama_kategori = $nama;
        $kat->kode_kategori = $kode_kategori;

        $kat->save();
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $kat = KategoriBuku::find($id);
        $kat->delete();
        return redirect('kategori');
    }
}
