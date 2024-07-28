<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;

    public function createSp($data){
        DB::table('san_phams')->insert($data);
    }

    public function delSp($id){
        DB::table('san_phams')
        ->where('id',$id)->delete();
    }

    public function editSp($id,$data){
        DB::table('san_phams')
        ->where('id',$id)
        ->update($data);
    }
    protected $table = 'san_phams';

    protected $fillable = [

        'ten_san_pham',
        'so_luong',
        'gia_san_pham',
        'gia_khuyen_mai',
        'ngay_nhap',
        'mo_ta',
        'trang_thai',
        'danh_muc_id'
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }

    public function hinhAnhs()
    {
        return $this->hasMany(HinhAnhSp::class);
    }

    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class);
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class);
    }

    public function chiTietGioHangs()
    {
        return $this->hasMany(ChiTietGioHang::class);
    }

    public $timstamps = false;
}
