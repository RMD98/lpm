<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnalint extends Model
{
    use HasFactory;
    protected $fillable = ['judul','url','nama_jurnal','jenis','p_issn','e_issn','volume','nomor','halaman','bukti'];
}
