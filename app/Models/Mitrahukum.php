<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitrahukum extends Model
{
    use HasFactory;
    protected $fillable = ['nama','bidang_usaha','no_badan_hukum','bukti'];
}
