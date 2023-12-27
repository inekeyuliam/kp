<?php

namespace App\Http\Controllers;
use App\PenerbitBuku;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
       $list = PenerbitBuku::all();
        // $list = DB::table('kategoris')->get();
        return view('penerbit.index',['listpenerbit' => $list]);
    }

    public function create()
    {
        
        return view('penerbit.create');
    }

    public function store(Request $request)
    {
        $nama_penerbit = $request->get('nama_penerbit');

        $penerbit = new PenerbitBuku();
        $penerbit->nama_penerbit= $nama_penerbit;
        $penerbit->save();
        return redirect('penerbit');
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

        $penerbit = PenerbitBuku::find($id);
        return view('penerbit.edit', ['itempenerbit' => $penerbit ]);
   
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
       
        $nama = $request->get('nama_penerbit');
        $penerbit = PenerbitBuku::find($id);
        
        $penerbit->nama_penerbit = $nama;

        $penerbit->save();
        return redirect('penerbit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $kat = PenerbitBuku::find($id);
        $kat->delete();
        return redirect('penerbit');
    }
}
