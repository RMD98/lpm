<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediamassa extends Model
{
    use HasFactory;
    protected $fillable =['judul','nidn','url','jenis','hal','bukti','nama_media'];
}
