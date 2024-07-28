@extends('layouts.admins.app')
@section('css')
@endsection
@section('content')
    <div class="card">
        <h4 class="card-header">Danh sách danh mục</h4>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Ảnh danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Danh mục cha</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>
                    @foreach ($danh_mucs as $index => $item)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>
                                <img src="{{ Storage::url($item->hinh_anh) }}" width="100" height="100" alt="">
                            </td>
                            <td>{{$item->ten_danh_muc}}</td>
                            <td>{{$item->mo_ta}}</td>
                            <td>{{$item->danh_muc_cha_id}}</td>
                            <td>
                                <button class="btn btn-warning">Sửa</button>
                                <form action="{{ route('danhmuc.destroy', $item ->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa không ?')">
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
