<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Akun extends Model
{
    use HasApiTokens;
    use HasFactory;
    protected $table = 'akun';
    protected $guarded = ['id'];
}
