<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function previewCV()
    {
        ///get url path of file
        $path = Storage::url($this->dokumen_cv);
        return asset($path);
    }
}
