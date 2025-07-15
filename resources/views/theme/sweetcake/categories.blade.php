@extends('theme.sweetcake.components.layout')

@section('content')
<style>
    .category-section {
        background-color: #fff7f0;
        padding: 40px 20px;
        font-family: 'Poppins', sans-serif;
        border-radius: 12px;
    }

    .category-section h3 {
        color: #5d4037;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .category-scroll {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 10px;
    }

    .category-card {
        display: inline-block;
        width: 180px;
        background-color: #fff;
        margin-right: 16px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 6px 12px rgba(0,0,0,0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        color: inherit;
    }

    .category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    }

    .category-icon {
        width: 70px;
        height: 70px;
        margin: 20px auto 10px;
        border-radius: 50%;
        background: #fbe9e7;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .category-icon img {
        width: 36px;
        height: 36px;
        object-fit: contain;
    }

    .category-card h6 {
        font-size: 1rem;
        font-weight: 600;
        margin: 8px 0 4px;
        color: #4e342e;
    }

    .category-card p {
        font-size: 0.8rem;
        color: #8d6e63;
        padding: 0 10px 16px;
        min-height: 40px;
    }

    /* Scrollbar Styling */
    .category-scroll::-webkit-scrollbar {
        height: 8px;
    }

    .category-scroll::-webkit-scrollbar-thumb {
        background: #d7ccc8;
        border-radius: 4px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .category-card {
            width: 140px;
        }
    }

    @media (max-width: 480px) {
        .category-card {
            width: 120px;
        }
    }
</style>

<div class="container category-section">
    <h3>Kategori Product</h3>
    <a href="#" class="mb-3 d-block text-decoration-underline text-muted" style="font-size: 14px;">Lihat Semua Kategori</a>

    <div class="category-scroll">
        @foreach($categories as $category)
            <a href="{{ URL::to('/category/'.$category->slug) }}" class="category-card">
                <div class="category-icon">
                    <img src="{{ $category->image }}" alt="{{ $category->name }}">
                </div>
                <h6>{{ $category->name }}</h6>
                <p>{{ $category->description }}</p>
            </a>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center w-100 mt-4">
    {{ $categories->links('vendor.pagination.simple-bootstrap-5') }}
</div>
@endsection
