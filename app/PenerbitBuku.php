<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerbitBuku extends Model
{
    protected $table = 'penerbit_bukus';

    public function buku(){
    return $this->hasMany("App\Buku");
	}
}
