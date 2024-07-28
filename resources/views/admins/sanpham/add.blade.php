@extends('layouts.admins.app')
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm danh mục</h4>
        <div class="card-body">
            <form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên Sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder=" Nhập tên sản phẩm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá Sản phẩm</label>
                    <input type="text" class="form-control" name="gia_san_pham" placeholder=" Nhập giá sản phẩm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="gia_khuyen_mai" placeholder=" Nhập gia khuyến mai">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngày nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap" placeholder="ngày nhập">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                   <textarea name="mo_ta" id="" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">số lượng</label>
                    <input type="text" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                </div>
                <div class="mb-3">
                    <label class="form-label">trạng thái</label>
                    <select name="trang_thai" class="form-control" id="">
                        <option value="" selected>chọn trạng thái</option>
                        <option value="1">còn hàng</option>
                        <option value="0">hết hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Danh mục</label>
                    <select name="danh_muc_id" id="" class="form-control">
                        <option selected>chọn danh mục</option>
                        @foreach ($listDanhMuc as $item)
                        <option value="{{$item->id}}">{{$item->ten_danh_muc}}</option>
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
