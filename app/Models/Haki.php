<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haki extends Model
{
    use HasFactory;
    protected $fillable=['judul','jenis','status','no_daftar','bukti'];
}
