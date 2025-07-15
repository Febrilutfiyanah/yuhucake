@extends('theme.sweetcake.components.layout')

@section('content')

<x-slot name="title"> Beranda</x-slot>

<style>
    body {
        background-color: #fffaf5;
    }

    h3 {
        color: #5d4037;
        font-weight: 600;
        margin: 0 16px 16px 16px;
    }

    /* KATEGORI */
    .category-scroll-wrapper {
        overflow-x: auto;
        white-space: nowrap;
        padding: 0 16px 24px 16px;
        margin-bottom: 24px;
    }

    .category-scroll-wrapper .col {
        display: inline-block;
        width: 200px;
        margin-right: 16px;
        vertical-align: top;
    }

    .card.category-card {
        background-color: #fff;
        border-radius: 16px;
        transition: all 0.3s ease-in-out;
        border: 1px solid #f3e5f5;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 16px 12px;
        height: 100%;
    }

    .card.category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    .card.category-card .mx-auto {
        background: linear-gradient(to top right, #ffe0b2, #fff3e0);
        border: 2px solid #ffe0b2;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        width: 64px;
        height: 64px;
        margin-bottom: 10px;
    }

    .card.category-card img {
        transition: transform 0.3s ease;
        width: 36px;
        height: 36px;
        object-fit: contain;
    }

    .card.category-card:hover img {
        transform: scale(1.1);
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
        color: #4e342e;
        margin-bottom: 4px;
    }

    .card-text.text-muted {
        color: #8d6e63 !important;
        font-size: 0.85rem;
        margin-bottom: 0;
    }

    /* PRODUK */
    .produk-section {
        margin-bottom: 80px;
    }

    .produk-scroll-wrapper {
        display: flex;
        overflow-x: auto;
        gap: 16px;
        padding: 0 16px 16px 16px;
        scroll-snap-type: x mandatory;
    }

    .produk-scroll-wrapper .col-md-3 {
        flex: 0 0 auto;
        width: 250px;
        scroll-snap-align: start;
    }

    .produk-scroll-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .produk-scroll-wrapper::-webkit-scrollbar-thumb {
        background-color: #d7ccc8;
        border-radius: 10px;
    }

    .card.product-card {
        border-radius: 16px;
        background-color: #ffffff;
        transition: 0.3s ease-in-out;
        border: 1px solid #fbe9e7;
        display: flex;
        flex-direction: column;
        text-align: center;
        padding: 16px 12px;
        height: 100%;
    }

    .card.product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
    }

    .card-img-top {
        object-fit: cover;
        height: 160px;
        width: 100%;
        border-radius: 12px;
        margin-bottom: 10px;
    }

    .card-body {
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
        color: #5d4037;
        margin-bottom: 4px;
    }

    .card-text.text-truncate {
        font-size: 0.85rem;
        color: #6d4c41;
        margin-bottom: 6px;
    }

    .fw-bold.text-primary {
        color: #d84315 !important;
        font-size: 0.9rem;
        margin-bottom: 4px;
    }

    .btn-outline-primary {
        border-color: #8d6e63;
        color: #8d6e63;
        font-weight: 500;
        font-size: 0.85rem;
        transition: 0.2s ease;
    }

    .btn-outline-primary:hover {
        background-color: #8d6e63;
        color: white;
    }

    .alert-info {
        background-color: #fff8e1;
        border-color: #ffe082;
        color: #6d4c41;
        margin: 0 16px;
    }

    @media (max-width: 576px) {
        .card-img-top {
            height: 140px;
        }

        .produk-scroll-wrapper .col-md-3 {
            width: 200px;
        }

        .category-scroll-wrapper .col {
            width: 160px;
        }
    }
</style>

<div class="container-fluid py-3">
    <!-- Kategori -->
    <div class="d-flex justify-content-between align-items-center mb-3 px-3">
        <h3>Kategori Produk</h3>
        <a href="{{ URL::to('/categories') }}" class="btn btn-outline-primary btn-sm me-3">Lihat Semua</a>
    </div>

    <div class="category-scroll-wrapper">
        @foreach($categories as $category)
            <div class="col">
                <a href="{{ URL::to('/category/'.$category->slug) }}" class="card text-decoration-none">
                    <div class="card category-card shadow-sm">
                        <div class="mx-auto">
                            <img src="{{ $category->image }}" alt="{{ $category->name }}">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">{{ $category->name }}</h6>
                            <p class="card-text text-muted small text-truncate">{{ $category->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<div class="container-fluid py-3 produk-section">
    <!-- Produk -->
    <div class="d-flex justify-content-between align-items-center mb-3 px-3">
        <h3>Produk Kami</h3>
        <a href="{{ URL::to('/products') }}" class="btn btn-outline-primary btn-sm me-3">Lihat Semua Produk</a>
    </div>

    <div class="produk-scroll-wrapper">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card shadow-sm">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/350x200?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-truncate">{{ $product->description }}</p>
                        <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <a href="{{ route('product.show', $product->slug) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info">Belum ada produk pada kategori ini.</div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center w-100 mt-4">
        {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
</div>

@endsection
