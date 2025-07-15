@extends("theme.sweetcake.components.layout")

@section('title', 'Products')

@section('content')

<style>
    .product-list .product-card {
        display: flex;
        flex-direction: row;
        gap: 20px;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 24px;
        background: #fff8f3;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .product-list .product-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }

    .product-list .product-info {
        padding: 16px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-grow: 1;
    }

    .product-list .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #5d4037;
    }

    .product-list .card-text {
        font-size: 0.9rem;
        color: #616161;
        margin-bottom: 10px;
    }

    .product-list .btn-outline-primary {
        border-color: #8d6e63;
        color: #8d6e63;
    }

    .product-list .btn-outline-primary:hover {
        background-color: #8d6e63;
        color: #fff;
    }

    .product-list .text-primary {
        color: #d84315 !important;
    }

    .search-box .form-control:focus {
        border-color: #8d6e63;
        box-shadow: 0 0 0 0.2rem rgba(141, 110, 99, 0.25);
    }

    .btn-primary {
        background-color: #8d6e63;
        border-color: #8d6e63;
    }

    .btn-primary:hover {
        background-color: #6d4c41;
        border-color: #6d4c41;
    }

    .search-box {
        max-width: 300px;
        margin-left: auto;
    }

    @media (max-width: 768px) {
        .product-list .product-card {
            flex-direction: column;
            align-items: center;
        }

        .product-list .product-image {
            width: 100%;
            height: auto;
            border-radius: 12px 12px 0 0;
        }

        .search-box {
            width: 100%;
            margin-top: 1rem;
        }
    }
</style>

<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h3 class="mb-0" style="font-size: 1.5rem;">Produk Kami</h3>
        <form action="{{ url()->current() }}" method="GET" class="search-box d-flex mt-2 mt-md-0">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari produk..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="product-list">
        @forelse($products as $product)
            <div class="product-card">
                <img src="{{ $product->image_url ? $product->image_url : 'https://via.placeholder.com/350x200?text=No+Image' }}" class="product-image" alt="{{ $product->name }}">
                <div class="product-info">
                    <div>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <a href="{{ route('product.show', $product->slug) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">Belum ada produk pada kategori ini.</div>
        @endforelse

        <div class="d-flex justify-content-center w-100 mt-4">
            {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
        </div>
    </div>
</div>

@endsection
