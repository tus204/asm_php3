<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $fillable = ['san_pham_id', 'user_id', 'noi_dung', 'thoi_gian', 'trang_thai'];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
