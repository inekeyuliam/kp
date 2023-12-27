<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilTransaksi extends Model
{
    public function bukus(){
	   return $this->belongsTo("App\Buku");
	}
	public function anggotas(){
	   return $this->belongsTo("App\Anggota");
	}
	protected $table = 'detil_transaksis';
    protected $fillable = [
        'anggota_id','buku_id', 'tgl_pinjam','tgl_batas'
    ];
}
