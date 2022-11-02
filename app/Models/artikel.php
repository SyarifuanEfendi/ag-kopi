<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['id','judul','isi','gambar'];
    public $timestamps = true;

    use HasFactory;
}
