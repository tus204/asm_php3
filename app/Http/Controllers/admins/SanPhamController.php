<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listSp = SanPham::orderByDesc('id')->get();
        return view('admins.sanpham.index',compact('listSp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listDanhMuc = DanhMuc::query()->get();
        return view('admins.sanpham.add',compact('listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->isMethod('POST')){
            $params = $request->except('_token');

            SanPham::create($params);
            return redirect()->route('sanpham.index')->with('success','thêm mới thành công');
        }
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
        $listDanhMuc = DanhMuc::query()->get();
        $sanPham = SanPham::query()->findOrFail($id);
        return view('admins.sanpham.edit',compact('listDanhMuc','sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if($request->isMethod('PUT')){
            $params = $request->except('_token','_method');
            $sanPham = SanPham::query()->findOrFail($id);

            $sanPham->update($params);

            return redirect()->route('sanpham.index')->with('success','cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sanpham = SanPham::findOrFail($id);
        if($sanpham){
            $sanpham->delete();

            return redirect()->route('sanpham.index')->with('success','xóa thành công');
        }

    }
}
