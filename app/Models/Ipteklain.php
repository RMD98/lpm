<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipteklain extends Model
{
    use HasFactory;
    protected $fillable =['judul','nidn','nama','jenis','deskripsi','bukti'];
}
