<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodtersertifikasi extends Model
{
    use HasFactory;
    protected $fillable = ['judul','nidn','instansi','no_keputusan','bukti'];
}
