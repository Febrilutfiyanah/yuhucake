@extends("theme.sweetcake.components.layout")

@section('title', $product->name)

@section('content')

<style>
    .product-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 40px;
    }

    .product-image {
        flex: 1 1 50%;
        max-width: 500px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        width: 100%;
    }

    .product-details {
        flex: 1 1 45%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 16px;
    }

    .product-name {
        font-size: 2rem;
        font-weight: bold;
        color: #4e342e;
        margin-bottom: 12px;
    }

    .product-price {
        font-size: 1.6rem;
        font-weight: bold;
        color: #d84315;
        margin-bottom: 12px;
    }

    .product-category {
        display: inline-block;
        background-color: #ffe0b2;
        color: #4e342e;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.85rem;
        white-space: nowrap;
        max-width: fit-content;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .keranjang-box {
        background-color: #fff8f5;
        padding: 24px;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        max-width: 400px;
    }

    .btn-primary {
        background-color: #8d6e63;
        border-color: #8d6e63;
    }

    .btn-primary:hover {
        background-color: #6d4c41;
        border-color: #6d4c41;
    }

    .btn-outline-primary {
        border-color: #8d6e63;
        color: #8d6e63;
    }

    .btn-outline-primary:hover {
        background-color: #8d6e63;
        color: #fff;
    }

    .bg-light {
        background-color: #fff8f6 !important;
    }

    .text-muted {
        font-size: 0.85rem;
        color: #888 !important;
    }
</style>

<div class="container my-5">

    <!-- Gambar & Detail Sampingan -->
    <div class="product-container">
        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/600x600' }}" alt="{{ $product->name }}" class="product-image">

        <div class="product-details">
            <div class="product-name">{{ $product->name }}</div>

            <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

            @if($product->old_price)
                <div class="text-muted text-decoration-line-through mb-2">
                    Rp {{ number_format($product->old_price, 0, ',', '.') }}
                </div>
            @endif

            <div class="product-category">{{ $product->category->name ?? '-' }}</div>

            <div class="keranjang-box mt-3">
                <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" class="form-control me-3" style="width: 80px;" value="1" min="1" max="{{ $product->stock }}">
                    <button class="btn btn-primary" type="submit">
                        + Tambah ke Keranjang
                    </button>
                </form>
                <div class="mt-3">
                    <p><strong>Stok:</strong>
                        <span class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                        </span>
                    </p>
                    <p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <h4 class="mb-3">Deskripsi Produk</h4>
            <div class="bg-light p-4 rounded shadow-sm">
                {!! nl2br(e($product->long_description ?? $product->description)) !!}
            </div>
        </div>
    </div>

    <!-- Produk Lainnya -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">Produk Lainnya</h3>
        </div>
        @forelse($relatedProducts as $relatedProduct)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $relatedProduct->image_url ?? 'https://via.placeholder.com/350x200?text=No+Image' }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                        <p class="card-text text-truncate">{{ $relatedProduct->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                            <a href="{{ route('product.show', $relatedProduct->slug) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info">Tidak ada produk terkait.</div>
            </div>
        @endforelse
    </div>
</div>

@endsection
