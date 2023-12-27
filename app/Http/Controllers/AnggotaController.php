<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Anggota::all();
        return view('anggota.index',['listanggota' => $list]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = Anggota::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "AG00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "AG0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "AG000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "AG00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "AG0".''.($lastId->id + 1);
            } else {
                    $kode = "AG".''.($lastId->id + 1);
            }
        }
        return view('anggota.create', compact('kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noinduk = $request->get('nomor_induk');
        $nama = $request->get('nama');
        $tanggal = $request->get('tanggal');
        $alamat = $request->get('alamat');
        $email = $request->get('email');
        $telepon = $request->get('telepon');
        $jk = $request->get('jenis_kelamin');
        $kelas = $request->get('kelas');
        $created_at = $request->get('created_at');
        $kode_anggota = $request->get('kode_anggota');

        $dataanggota = new Anggota();
        $dataanggota->no_induk = $noinduk;
        $dataanggota->nama = $nama;
        $dataanggota->tanggal = $tanggal;
        $dataanggota->alamat = $alamat;
        $dataanggota->email = $email;
        $dataanggota->jenis_kelamin = $jk;
        $dataanggota->kelas = $kelas;
        $dataanggota->telepon = $telepon;
        $dataanggota->kode_anggota = $kode_anggota;

        $dataanggota->save();
        return redirect('anggota');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemanggota = Anggota::find($id);
        return view('anggota.show',['itemanggota' => $itemanggota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', ['itemanggota' => $anggota ]);
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
        $noinduk = $request->get('nomor_induk');
        $nama = $request->get('nama');
        $tanggal = $request->get('tanggal');
        $alamat = $request->get('alamat');
        $email = $request->get('email');
        $telepon = $request->get('telepon');
        $jk = $request->get('jenis_kelamin');
        $kelas = $request->get('kelas');
        $kode_anggota = $request->get('kode_anggota');

        $dataanggota = Anggota::find($id);
        
        $dataanggota->no_induk = $noinduk;
        $dataanggota->nama = $nama;
        $dataanggota->tanggal = $tanggal;
        $dataanggota->alamat = $alamat;
        $dataanggota->email = $email;
        $dataanggota->jenis_kelamin = $jk;
        $dataanggota->kelas = $kelas;
        $dataanggota->telepon = $telepon;
        $dataanggota->kode_anggota = $kode_anggota;

        $dataanggota->save();
        return redirect('anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $angg = Anggota::find($id);
        $angg->delete();
        return redirect('anggota');
    }
   
    public function search(Request $request)
    {   
        $search = $request->get('search');
        $listanggota = DB::table('anggotas')
        ->where('kode_anggota', 'like', '%'.$search.'%')
             ->orWhere('no_induk', 'like', '%'.$search.'%')
             ->orWhere('nama', 'like', '%'.$search.'%')
             ->orderBy('id', 'desc')
             ->get();
        return view('anggota.index',['listanggota' => $listanggota]);
    }
}
