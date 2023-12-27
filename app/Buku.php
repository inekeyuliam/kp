<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Anggota;
class Buku extends Model
{
	protected $table = 'bukus';
    // public function anggotas()
    // {
    //     return $this->belongsToMany(Anggota::class);
    // }
     public function kategori_buku(){
        return $this->belongsTo("App\KategoriBuku","kategori_id");
    }
    public function penerbit_buku(){
        return $this->belongsTo("App\PenerbitBuku","penerbit_id");
    }
    public function penulis_buku(){
        return $this->belongsTo("App\PenulisBuku","penulis_id");
    }
     public function detil_transaksis(){
    	return $this->hasMany("App\DetilTransaksi");
    }
    protected $fillable = [
        'kategori_id','judul', 'penerbit_id','pengarang','ISBN', 'tahun_terbit', 'quantity'
    ];
}
