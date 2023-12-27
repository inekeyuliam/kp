<?php

namespace App\Http\Controllers;
use App\PenulisBuku;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    public function index()
    {
       $list = PenulisBuku::all();
        // $list = DB::table('kategoris')->get();
        return view('penulis.index',['listpenulis' => $list]);
    }

    public function create()
    {
        
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $nama_penulis = $request->get('nama_penulis');

        $penulis = new PenulisBuku();
        $penulis->nama_penulis= $nama_penulis;
        $penulis->save();
        return redirect('penulis');
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

        $penulis = PenulisBuku::find($id);
        return view('penulis.edit', ['itempenulis' => $penulis ]);
   
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
       
        $nama = $request->get('nama_penulis');
        $penulis = PenulisBuku::find($id);
        
        $penulis->nama_penulis = $nama;

        $penulis->save();
        return redirect('penulis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $kat = PenulisBuku::find($id);
        $kat->delete();
        return redirect('penulis');
    }
}
