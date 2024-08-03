@extends('layouts.app')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">My Account</h2>
            <div class="row">
                @include('user.account-nav')
                <div class="col-lg-9">
                    <div class="page-content my-account__dashboard">
                        <div class="mb-3">
                            <h3>Thông tin tài khoản</h3>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <div class="">
                                    <h6 class="">Name: </h6>
                                    <p class="" style="font-size:16px">{{ $info->name }}</p>
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div>
                                    <h6>Email: </h6>
                                    <p style="font-size:16px">{{ $info->email }}</p>
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <h6>Phone:</h6>
                                <p>{{$info->mobile}}</p>
                            </div>

                        </div>
                        <div class="mt-3 d-flex align-items-center">
                            <a href="{{route('user.edit',$info->id)}}" class="btn btn-dark btn-lg rounded-3 me-2">Chỉnh sửa</a>
                            <form action="{{route('user.destroy',$info->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-lg rounded-3" type="submit">xóa tài khoản</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
