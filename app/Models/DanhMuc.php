<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhMuc extends Model
{
    use HasFactory;
    public function getAll() {
        $listDanhMuc = DB::table('danh_mucs')->get();
        return $listDanhMuc;
    }

        public function createDanhMuc($data){
        DB::table('danh_mucs')->insert(
            [
                'hinh_anh' => $data['hinh_anh'],
                'ten_danh_muc' => $data['ten_danh_muc'],
                'mo_ta' => $data['mo_ta'],
                'danh_muc_cha_id' => $data['danh_muc_cha_id'],
            ]
    );
    }

    public function deleteDanhMuc($id){
        DB::table('danh_mucs')->where('id',$id)->delete();

    }
}
