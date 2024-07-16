<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_don_hang',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'so_dien_thoai_nguoi_nhan',
        'dia_chi_nguoi_nhan',
        'ngay_dat',
        'tong_tien',
        'ghi_chu',
        'user_id',
        'phuong_thuc_thanh_toan_id',
        'trang_thai_don_hang_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phuongThucThanhToan()
    {
        return $this->belongsTo(PhuongThucThanhToan::class);
    }

    public function trangThaiDonHang()
    {
        return $this->belongsTo(TrangThaiDonHang::class);
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class);
    }
}
