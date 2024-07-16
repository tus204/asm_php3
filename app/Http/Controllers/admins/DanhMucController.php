<?php

namespace App\Http\Controllers\admins;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DanhMucController extends Controller
{

    public $danh_mucs;
    public function __construct()
    {
        $this->danh_mucs = new DanhMuc();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listDanhMuc = $this->danh_mucs->getAll();
        //($listDanhMuc);
        return view('admins.danhmuc.index',['danh_mucs' => $listDanhMuc]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.danhmuc.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             if ($request->hasFile('hinh_anh')){
         $filename= $request->file('hinh_anh')->store('uploads/danhmuc','public');
     } else {
         $filename = null;
     }
         $dataInsert = [
             'hinh_anh' => $filename,
             'ten_danh_muc' => $request->ten_danh_muc,
             'mo_ta' => $request->mo_ta,
             'danh_muc_cha_id' => $request->danh_muc_cha_id,
         ];
         //dd($dataInsert);
         $this->danh_mucs->createDanhMuc($dataInsert);
          return redirect()->route('danhmuc.index')->with('success','Thêm sản phẩm thành công');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $danh_mucs = DanhMuc::findOrFail($id);

        if($danh_mucs){
            $this->danh_mucs->deleteDanhMuc($id);
        }
        return redirect()->route('danhmuc.index')->with('success','Xóa thành công');

    }
}
