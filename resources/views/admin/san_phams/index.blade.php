@extends('layouts.admin')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>All Products</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">All Products</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search" method="GET" action="{{ route('san_phams.index') }}">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="search"
                                    tabindex="2" value="{{ request()->input('search') }}" aria-required="true">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('san_phams.create') }}"><i class="icon-plus"></i>Add
                        new</a>
                </div>
                {{-- @if (Session::has('success'))
                    <h5 class="alert alert-success">{{ Session::get('success') }}</h5>
                @endif --}}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>SalePrice</th>
                                <th>SKU</th>
                                <th>Category</th>
                                {{-- <th>Brand</th> --}}
                                <th>Hot</th>
                                <th>Stock</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sanPhams as $sp)
                                <tr>
                                    <td>{{ $sp->id }}</td>
                                    <td class="pname">
                                        <div class="image">
                                            <img src="{{ Storage::url($sp->hinh_anh) }}" alt="" class="image">
                                        </div>
                                        <div class="name text-truncate ">
                                            <a href="" class="body-title-2">{{ $sp->ten }}</a>
                                            <div class="text-truncate text-tiny mt-3">{{ $sp->slug }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $sp->gia }}</td>
                                    <td>{{ $sp->gia_giam == null ? 'N/A' : $sp->gia_giam }}</td>
                                    <td class="text-truncate ">{{ $sp->ma_sp }}</td>
                                    <td class="text-truncate">{{ $sp->danh_muc->ten }}</td>
                                    {{-- <td>Brand2</td> --}}
                                    <td>{{ $sp->hot == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ $sp->tinh_trang == 'con hang' ? 'In stock' : 'Out of stock' }}</td>
                                    <td>{{ $sp->so_luong }}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('san_phams.show', $sp) }}">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </a>
                                            <a href="{{ route('san_phams.edit', $sp) }}">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <form action="{{ route('san_phams.destroy', $sp) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $sanPhams->withQueryString()->links('pagination::bootstrap-5') }}
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
@endpush
