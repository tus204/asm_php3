@extends('layouts.admins.app')
@section('content')
    <div class="card">
        <h4 class="card-header">Sửa sản phẩm</h4>
        <div class="card-body">
            <form action="{{ route('sanpham.update',$sanPham->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Tên Sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder=" Nhập tên sản phẩm" value="{{$sanPham->ten_san_pham}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá Sản phẩm</label>
                    <input type="text" class="form-control" name="gia_san_pham" placeholder=" Nhập giá sản phẩm" value="{{$sanPham->gia_san_pham}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="gia_khuyen_mai" placeholder=" Nhập gia khuyến mai" value="{{$sanPham->gia_khuyen_mai}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap" placeholder="ngày nhập" value="{{$sanPham->ngay_nhap}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                   <textarea name="mo_ta" id="" class="form-control">{{$sanPham->mo_ta}}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">số lượng</label>
                    <input type="text" class="form-control" name="so_luong" placeholder="Nhập số lượng" value="{{$sanPham->so_luong}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">trạng thái</label>
                    <select name="trang_thai" class="form-control" id="">
                        <option value="1" {{$sanPham->trang_thai==1 ? 'selected' : ''}}>còn hàng</option>
                        <option value="0" {{$sanPham->trang_thai==0 ? 'selected' : ''}}>hết hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Danh mục</label>
                    <select name="danh_muc_id" id="" class="form-control">

                        @foreach ($listDanhMuc as $item)
                        <option value="{{$item->id}}" {{$sanPham->danh_muc_id == $item->id ? 'selected':"" }}>{{$item->ten_danh_muc}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
