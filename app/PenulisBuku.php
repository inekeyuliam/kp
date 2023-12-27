<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenulisBuku extends Model
{
    protected $table = 'penulis_buku';

    public function buku(){
    return $this->hasMany("App\Buku");
	}
}
