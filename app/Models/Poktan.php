<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poktan extends Model
{
    use HasFactory;

    protected $table = 'poktans';
    protected $fillable = ['place_name','address','images','logitude','latitude'
        ,'luas_lahan','jumlah_tanaman','jenis_kopi','jarak_tanam','waktu_tanam','produksi','id_user'];
    public $timestamps = true;

    // protected $guarded = [];
}
