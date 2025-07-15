@extends('theme.sweetcake.components.layout')

@section('title', $category->name)

@section('content')
<style>
    body {
        background-color: #fffaf5;
    }

    h3 {
        color: #4e342e;
        font-weight: 700;
    }

    .product-card {
        border: none;
        border-radius: 12px;
        background-color: #fbeee0;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }

    .product-card .card-title {
        color: #5d4037;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .product-card .card-text {
        color: #6d4c41;
        font-size: 0.9rem;
    }

    .product-card .text-primary {
        color: #8d6e63 !important;
    }

    .btn-outline-primary {
        color: #6d4c41;
        border-color: #6d4c41;
    }

    .btn-outline-primary:hover {
        background-color: #6d4c41;
        color: #fff;
    }

    .alert-info {
        background-color: #fff3e0;
        border-color: #ffe0b2;
        color: #5d4037;
    }

    .pagination .page-link {
        color: #5d4037;
        border-color: #d7ccc8;
    }

    .pagination .page-link:hover {
        background-color: #d7ccc8;
        color: #4e342e;
    }

    .pagination .active .page-link {
        background-color: #8d6e63;
        border-color: #8d6e63;
        color: #fff;
    }
</style>

<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h3 class="mb-2" style="font-size: 1.7rem;">{{ $category->name }}</h3>
            <p class="text-muted">{{ $category->description }}</p>
        </div>
    </div>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100 shadow-sm">
                    <img src="{{ $product->image_url ? $product->image_url : 'https://via.placeholder.com/350x200?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-truncate">{{ $product->description }}</p>
                        <div class="mt-auto">
                            <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <a href="{{ route('product.show', $product->slug) }}" class="btn btn-outline-primary btn-sm float-end">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info">Belum ada produk pada kategori ini.</div>
            </div>
        @endforelse

        <div class="d-flex justify-content-center w-100 mt-4">
            {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
