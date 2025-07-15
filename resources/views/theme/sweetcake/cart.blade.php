@extends('theme.sweetcake.components.layout')

@section('content')
<style>
    body {
        background-color: #fff8f3;
        color: #5d4037;
    }

    h1 {
        font-weight: 700;
        color: #4e342e;
    }

    .card {
        border: none;
        border-radius: 12px;
        background-color: #fbeee0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .cart-item {
        background-color: #fff;
        padding: 10px;
        border-radius: 8px;
    }

    .cart-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border: 2px solid #d7ccc8;
        background-color: #fff3e0;
    }

    .cart-item-name {
        font-size: 16px;
        color: #5d4037;
        font-weight: 600;
    }

    .cart-item-price,
    .cart-item-subtotal {
        color: #8d6e63;
        font-size: 14px;
    }

    .form-control-sm {
        background-color: #fff8f3;
        border-color: #d7ccc8;
    }

    .btn-outline-secondary {
        color: #5d4037;
        border-color: #a1887f;
    }

    .btn-outline-secondary:hover {
        background-color: #a1887f;
        color: #fff;
    }

    .btn-danger {
        background-color: #d32f2f;
        border: none;
    }

    .btn-danger:hover {
        background-color: #b71c1c;
    }

    .btn-primary {
        background-color: #6d4c41;
        border: none;
    }

    .btn-primary:hover {
        background-color: #5d4037;
    }

    .btn-outline-primary {
        color: #6d4c41;
        border-color: #6d4c41;
    }

    .btn-outline-primary:hover {
        background-color: #6d4c41;
        color: #fff;
    }

    .total-section {
        font-size: 16px;
        color: #4e342e;
    }

    .alert-info {
        background-color: #fff3e0;
        border-color: #ffe0b2;
        color: #5d4037;
    }
</style>

<div class="container my-5">
    <h1 class="mb-4">Keranjang Belanja</h1>

    @if($cart && count($cart->items))
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-body p-3">
                        @forelse($cart->items as $item)
                            <div class="cart-item d-flex align-items-center mb-3 border-bottom pb-3">
                                <img src="{{ $item->itemable->image_url ?? 'https://via.placeholder.com/80?text=Product' }}" class="cart-img me-3 rounded" alt="{{ $item->itemable->name }}">
                                <div class="flex-grow-1">
                                    <h5 class="cart-item-name mb-1">{{ $item->itemable->name }}</h5>
                                    <p class="cart-item-price mb-0 text-muted">Rp.{{ number_format($item->itemable->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline-flex me-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                        <input type="text" name="quantity" value="{{ $item->quantity }}" class="form-control form-control-sm text-center mx-1" style="width: 50px;" readonly>
                                        <button type="submit" name="action" value="increase" class="btn btn-outline-secondary btn-sm">+</button>
                                    </form>

                                    <span class="cart-item-subtotal mb-0 me-3 fw-semibold">Rp.{{ number_format($item->itemable->price * $item->quantity, 0, ',', '.') }}</span>

                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini dari keranjang?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">
                                Keranjang belanja Anda kosong.
                            </div>
                        @endforelse
                    </div>
                </div>
                <a href="{{ URL::to('/products') }}" class="btn btn-outline-primary mt-2"><i class="bi bi-arrow-left"></i> Lanjut Belanja</a>
            </div>
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Ringkasan Pesanan</h5>
                        <div class="d-flex justify-content-between total-section mb-2">
                            <span>Subtotal</span>
                            <span>Rp.{{ number_format($cart->calculatedPriceByQuantity(), 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between total-section fw-bold">
                            <span>Total</span>
                            <span>Rp.{{ number_format($cart->calculatedPriceByQuantity(), 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 mt-3">Lanjut ke Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            Keranjang belanja Anda kosong.
        </div>
    @endif
</div>
@endsection
