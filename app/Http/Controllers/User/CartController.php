<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listCart()
    {
        return view('user.carts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        // dd($request->all());

        $sanPham = SanPham::findOrFail($productId);

        // khởi tạo 1 mảng chưa cart info trên session
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['so_luong'] += $quantity;
        } else {
            $cart[$productId] = [
                'ten_san_pham' => $sanPham->ten,
                'so_luong' => $quantity,
                // 'gia' => isset($sanPham->gia_giam) ? $sanPham->gia_giam : $sanPham->gia,
                'gia' => $sanPham->finalPrice(),
                'hinh_anh' => $sanPham->hinh_anh,
            ];
        }
        dd($cart);
        session()->put('cart', $cart);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
