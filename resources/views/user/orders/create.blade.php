@extends('layouts.app')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            {{-- <h2 class="page-title">Shipping and Checkout</h2> --}}
            <div class="checkout-steps">
                <a href="{{ route('cart.list') }}" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="checkout.html" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="order-confirmation.html" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>
            <form name="checkout-form" action="{{ route('donhangs.store') }}" method="POST" novalidate>
                @csrf
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <div class="row">
                            <div class="col-6">
                                <h4>SHIPPING DETAILS</h4>
                            </div>
                            <div class="col-6">
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="ten_nguoi_nhan" value="{{ Auth::user()->name }}">
                                    <label for="name">Full Name *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="sdt_nguoi_nhan" value="{{ Auth::user()->mobile }}">
                                    <label for="phone">Phone Number *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="email_nguoi_nhan" value="{{ Auth::user()->email }}">
                                    <label for="zip">Email *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="{{ Auth::user()->dia_chis[0]->dia_chi }}">
                                    <label for="state">Address *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="address" required="">
                                    <label for="address">House no, Building Name *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="locality" required="">
                                    <label for="locality">Road Name, Area, Colony *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="ghi_chu" required="">
                                    <label for="ghi_chu">Note *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th align="right">PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $key => $item)
                                            <tr>
                                                <td>
                                                    {{ $item['ten'] }} x {{ $item['so_luong'] }}
                                                </td>
                                                <td align="right">
                                                    ${{ number_format($item['gia'] * $item['so_luong']) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td align="right">
                                                ${{ $subTotal }}
                                                <input type="hidden" name="tien_hang" value="{{ $subTotal }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td align="right">
                                                ${{ $shipping }}
                                                <input type="hidden" name="tien_ship" value="{{ $shipping }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td align="right" class="text-red">
                                                <b>${{ $total }}</b>
                                                <input type="hidden" name="tong_tien" value="{{ $total }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__payment-methods">
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="" id="checkout_payment_method_3" checked>
                                    <label class="form-check-label" for="checkout_payment_method_3" >
                                        Cash on delivery
                                        <p class="option-detail">
                                            Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida
                                            nec dui. Aenean
                                            aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra
                                            nunc, ut aliquet
                                            magna posuere eget.
                                        </p>
                                    </label>
                                </div>
                                <div class="policy-text">
                                    Your personal data will be used to process your order, support your experience
                                    throughout this
                                    website, and for other purposes described in our <a href="terms.html"
                                        target="_blank">privacy
                                        policy</a>.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-checkout">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection
