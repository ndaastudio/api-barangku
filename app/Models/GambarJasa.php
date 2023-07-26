<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarJasa extends Model
{
    use HasFactory;
    protected $table = 'gambar_jasa';
    protected $guarded = ['id'];
}
