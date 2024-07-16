<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongThucThanhToan extends Model
{
    use HasFactory;

    protected $fillable = ['ten_phuong_thuc'];

    public function donHangs()
    {
        return $this->hasMany(DonHang::class);
    }
}
