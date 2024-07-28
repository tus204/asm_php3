@extends('layouts.admins.app')
@section('css')
@endsection
@section('content')
    <div class="card">
        <h4 class="card-header">Danh sách danh mục</h4>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>hình ảnh</th>
                    <th>danh mục</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>
                    @foreach ($listSp as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->ten_san_pham }}</td>
                            <td>
                                <img src="{{ Storage::url($item->hinh_anh) }}" width="100" height="100" alt="">
                            </td>
                            <td>{{ $item->danhMuc->ten_danh_muc }}</td>
                            <td>{{ $item->gia_san_pham }}</td>
                            <td>{{ $item->so_luong }}</td>
                            <td>{{ $item->trang_thai == 1 ? 'còn hàng' : 'hết hàng' }}</td>
                            <td>
                                <a href="{{ route('sanpham.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('sanpham.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có muốn xóa không ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
