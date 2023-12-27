<?php

namespace App\Http\Controllers;

use App\KategoriBuku;
use App\PenerbitBuku;
use App\PenulisBuku;
use App\Buku;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Buku::with('penerbit_buku')->get();
        $penulis = Buku::with('penulis_buku')->get();
        $datakat = Buku::with('kategori_buku')->get();
       // dd($data->kategori_buku);
        return view('buku.index', ['listbuku' => $datakat, 'listpen' => $penerbit, 'listpenulis' => $penulis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriBuku::all();
        $penerbit = PenerbitBuku::all();
        $penulis = PenulisBuku::all();

        // return view('buku.create',['listkat' => $kategori]);
        $getRow = Buku::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "BK0000001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "BK000000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "BK00000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "BK0000".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "BK000".''.($lastId->id + 1);
            } else if ($lastId->id < 99999){
                    $kode = "BK00".''.($lastId->id + 1);
            } else if ($lastId->id < 999999){
                    $kode = "BK0".''.($lastId->id + 1);
            }else{
                    $kode = "BK".''.($lastId->id + 1);
            }
        }
        return view('buku.create',['listkat' => $kategori, 'kode' => $kode, 'listpenerbit' => $penerbit, 'listpenulis' => $penulis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $judul = $request->get('judul');
        $kategori = $request->get('kategori');
        $penerbit = $request->get('penerbit');
        $ISBN = $request->get('ISBN');
        $penulis = $request->get('penulis');
        $th = $request->get('tahun_terbit');
        $qty = $request->get('quantity');
        $kode_buku = $request->get('kode_buku');

        $book = new Buku();
        $book->judul = $judul;
        $book->penerbit_id = $penerbit;
        $book->ISBN = $ISBN;
        $book->penulis_id= $penulis;
        $book->tahun_terbit = $th;
        $book->quantity = $qty;
        $book->kategori_id = $kategori;
        $book->kode_buku = $kode_buku;
        $book->save();

        return redirect('buku')->with('alert', 'Deleted!');;

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
         $buku = Buku::find($id);
         $listkat = KategoriBuku::all();
         $listpen = PenerbitBuku::all();
         $listpenulis = PenulisBuku::all();

        return view('buku.edit', ['itembuku' => $buku, 'itemkategori' => $listkat, 'itempenerbit' => $listpen, 'itempenulis' => $listpenulis]);
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
        $judul = $request->get('judul');
        $kategori = $request->get('kategori');
        $penerbit = $request->get('penerbit');
        $ISBN = $request->get('ISBN');
        $penulis = $request->get('penulis');
        $th = $request->get('tahun_terbit');
        $qty = $request->get('quantity');
        $kode_buku = $request->get('kode_buku');

        $book = Buku::find($id);
        $book->judul = $judul;
        $book->penerbit_id = $penerbit;
        $book->ISBN = $ISBN;
        $book->penulis_id= $penulis;
        $book->tahun_terbit = $th;
        $book->quantity = $qty;
        $book->kategori_id = $kategori;
        $book->kode_buku = $kode_buku;
        $book->save();
        
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
   
        $buku->delete();
        return redirect('buku');
    }
    public function search(Request $request)
    {   
        $search = $request->get('search');
        $buku =  Buku::with('kategori_buku')
        ->where('kode_buku', 'like', '%'.$search.'%')
             ->orWhere('judul', 'like', '%'.$search.'%')
             ->orderBy('id', 'desc')
             ->get();
        return view('buku.index',['listbuku' => $buku]);
    }
}
