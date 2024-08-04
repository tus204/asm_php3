@extends('layouts.app')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <div class="checkout-steps">
                <a href="#" class="checkout-steps__item active" disabled>
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="#" class="checkout-steps__item" disabled>
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="#" class="checkout-steps__item" disabled>
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>
            <div class="shopping-cart">
                <form action="{{ route('cart.update') }}" method="POST" class="cart-table__wrapper ">
                    @csrf
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $key => $item)
                                <tr>
                                    <td>
                                        <div class="shopping-cart__product-item">
                                            <a href="{{ route('product.detail', $item['slug']) }}">
                                                <img loading="lazy" src="{{ Storage::url($item['hinh_anh']) }}"
                                                    width="120" height="120" alt="" />
                                                <input type="hidden" name="cart[{{ $key }}][hinh_anh]"
                                                    value="{{ $item['hinh_anh'] }}">
                                                <input type="hidden" name="cart[{{ $key }}][slug]"
                                                    value="{{ $item['slug'] }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 150px;">
                                            <a href="{{ route('product.detail', $item['slug']) }}"
                                                class="fs-6">{{ $item['ten'] }}</a>
                                            <input type="hidden" name="cart[{{ $key }}][ten]"
                                                value="{{ $item['ten'] }}">
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="shopping-cart__product-price text-red">${{ number_format($item['gia'], 0, '.', '') }}</span>
                                        <input type="hidden" name="cart[{{ $key }}][gia]"
                                            value="{{ $item['gia'] }}">
                                    </td>
                                    <td>
                                        <div class="qty-control position-relative">
                                            <input type="number" name="cart[{{ $key }}][so_luong]"
                                                value="{{ $item['so_luong'] }}" min="1"
                                                class="qty-control__number text-center">
                                            <div class="qty-control__reduce">-</div>
                                            <div class="qty-control__increase">+</div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="shopping-cart__subtotal text-red">${{ number_format($item['gia'] * $item['so_luong'], 0) }}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="remove-cart">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                <path
                                                    d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cart-table-footer justify-content-end">
                        {{-- <form action="#" class="position-relative bg-body">
                            <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
                            <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
                                value="APPLY COUPON">
                        </form> --}}
                        <button type="submit" class="btn btn-light">UPDATE CART</button>
                    </div>
                </form>
                <div class="shopping-cart__totals-wrapper">
                    <div class="sticky-content">
                        <div class="shopping-cart__totals">
                            <h3>Cart Totals</h3>
                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td class="text-red">${{ number_format($subTotal) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox"
                                                    value="" id="free_shipping" checked>
                                                <label class="form-check-label text-red"
                                                    for="free_shipping">${{ number_format($ship_fee) }}</label>
                                            </div>
                                            <div>Shipping to AL.</div>
                                            <div>
                                                <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="text-red">${{ number_format($total) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mobile_fixed-btn_wrapper">
                            <div class="button-wrapper container">
                                <a href="checkout.html" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
