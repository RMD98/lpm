<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaran extends Model
{
    use HasFactory;
    protected $fillable =['haki','prod_standar','buku','prod_sertif','mbh',
    'wbm','forum_ilmiah','media_massa','jurnal_internasional','ipteklain'];
}
