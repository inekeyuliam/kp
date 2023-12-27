<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
	protected $table = 'kategori_bukus';

    public function buku(){
    return $this->hasMany("App\Buku");
	}
}
