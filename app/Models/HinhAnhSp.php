<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhSp extends Model
{
    use HasFactory;

    protected $fillable = ['link_anh', 'san_pham_id'];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
