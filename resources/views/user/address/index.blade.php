@extends('layouts.user')

@section('title')
    Address
@endsection

@section('content')
    <div class="page-content my-account__address">
        <div class="row">
            <div class="col-6">
                <p class="notice">The following addresses will be used on the checkout page by default.</p>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('address.create') }}" class="btn btn-sm btn-info">Add New Address</a>
            </div>
        </div>
        <div class="my-account__address-list row">
            <h5>Shipping Address</h5>

            @foreach ($diaChis as $diaChi)
                <div class="my-account__address-item col-md-6">
                    <div class="my-account__address-item__title">
                        <h5>{{ $diaChi->ho_ten }} <i class="fa fa-check-circle text-success"></i></h5>
                        <div style="display: flex; gap: 12px;">
                            <a href="{{ route('address.edit', $diaChi->id) }}">Edit</a>
                            <form action="{{ route('address.destroy', $diaChi->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div style="border: 1px solid #ccc; padding: 2px 8px; border-radius: 2px; cursor:pointer;"
                                    class="delete">
                                    Delete</div>
                            </form>
                        </div>
                    </div>
                    <div class="my-account__address-item__detail">
                        <p>
                            <b>Địa chỉ:</b> {{ $diaChi->dia_chi }}
                        </p>
                        <p>
                            <b> Tỉnh (thành phố):</b> {{ $diaChi->thanh_pho }}
                        </p>
                        <p>
                            <b>Quận (huyện):</b> {{ $diaChi->quan }}
                        </p>
                        <p>
                            <b>Phường (xã):</b> {{ $diaChi->phuong }}
                        </p>
                        <br>
                        <p>
                            <b>Số điện thoại:</b> {{ $diaChi->so_dien_thoai }}
                        </p>
                    </div>
                </div>
            @endforeach
            <hr>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".delete").on('click', function(e) {
                e.preventDefault();
                var selectedForm = $(this).closest('form');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        selectedForm.submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success",
                            timer: 10000,
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "Cancelled",
                            text: "Your imaginary file is safe :)",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>
@endsection
