<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'penulis',
        'genre',
        'sinopsis',
        'penerbit',
        'buku',
        'done_time',
        'views',
        'isi',
        'image',
    ];

}
