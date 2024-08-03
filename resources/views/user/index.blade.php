@extends('layouts.app')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">My Account</h2>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="account-nav">
                        <li><a href="{{ route('user.index') }}" class="menu-link menu-link_us-s">Dashboard</a></li>
                        <li><a href="account-orders.html" class="menu-link menu-link_us-s">Orders</a></li>
                        <li><a href="account-address.html" class="menu-link menu-link_us-s">Addresses</a></li>
                        <li><a href="{{route('user.show',$user->id)}}" class="menu-link menu-link_us-s">Account Details</a></li>
                        <li><a href="account-wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="">
                                    <div class="icon"><i class="icon-log-out"></i></div>
                                    <div class="text">Logout</div>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="page-content my-account__dashboard">
                        <p>Hello <strong>{{$user->name}}</strong></p>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
