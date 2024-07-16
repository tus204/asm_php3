@extends('layouts.admins.app')
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm danh mục</h4>
        <div class="card-body">
            <form action="{{ route('danhmuc.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" name="hinh_anh" onchange="showImage(event)">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" placeholder=" Nhập tên danh mục">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="mo_ta" placeholder="Nhập mô tả">
                </div>
                <div class="mb-3">
                    <label class="form-label">Danh mục cha</label>
                    <input type="text" class="form-control" name="danh_muc_cha_id" placeholder="Nhập mô tả">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection