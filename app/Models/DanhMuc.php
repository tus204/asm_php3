<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $fillable = ['hinh_anh', 'ten_danh_muc', 'mo_ta', 'danh_muc_cha_id'];

    public function danhMucCha()
    {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_cha_id');
    }

    public function sanPhams()
    {
        return $this->hasMany(SanPham::class);
    }
}
