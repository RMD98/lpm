<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = ['judul','judul_forum','tingkat','penyelenggara','isbn','dari','sampai','tempat','bukti'];
}