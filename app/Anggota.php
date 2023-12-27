<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buku;
class Anggota extends Model
{
    public function detil_transaksis(){
    return $this->hasMany("App\DetilTransaksi");

    }
    // public function bukus()
    // {
    //     return $this->belongsToMany(Buku::class);
    // }
    public $timestamps = true;
    protected $table = 'anggotas';
    protected $fillable = [
        'no_induk','nama', 'kelas','jenis_kelamin','email','telepon','alamat'
    ];
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
