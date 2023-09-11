<?php

namespace App\Models;

use App\Models\Akun;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReqNonaktifAkun extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'req_nonaktif_akun';

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }
}
