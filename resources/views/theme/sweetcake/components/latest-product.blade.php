<style>
    .bg-brown-light {
        background-color: #fbeee0;
    }

    .text-brown-dark {
        color: #5d4037;
    }

    .text-brown {
        color: #8d6e63;
    }

    .hover-opacity-100 {
        opacity: 1 !important;
    }

    .hover-content {
        transition: 0.3s ease-in-out;
        opacity: 0;
    }

    .thumb:hover .hover-content {
        opacity: 1;
    }

    .item img {
        transition: transform 0.3s ease;
    }

    .item:hover img {
        transform: scale(1.03);
    }

    .stars i {
        color: #ffc107; /* warna bintang kuning */
    }

    .item {
        margin: 15px;
        border-radius: 12px;
    }

    .section-heading h2 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
</style>

<section class="section bg-brown-light py-5" id="{{ $id }}">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="section-heading text-brown-dark">
                    <h2 class="fw-bold">{{ $title }}</h2>
                    <span class="text-muted">{!! $description !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="{{ $id }}-item-carousel">
                    <div class="owl-{{ $id }}-item owl-carousel">
                        @foreach($products as $product)
                            <div class="item bg-white rounded shadow-sm p-3 border border-0">
                                <div class="thumb position-relative">
                                    <div class="hover-content position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50 rounded opacity-0 hover-opacity-100 transition">
                                        <ul class="list-unstyled d-flex gap-3">
                                            <li>
                                                <a href="{{ route('product.show', $product->slug) }}" class="text-light">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                            <li><a href="#" class="text-light"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#" class="text-light"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img class="img-fluid rounded" src="{{ $product->image_url ?? asset('theme/hexashop/assets/images/no-image.jpg') }}" alt="{{ $product->name }}">
                                </div>
                                <div class="down-content text-center mt-3">
                                    <h4 class="text-brown-dark fw-semibold">{{ $product->name }}</h4>
                                    <span class="text-brown fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <ul class="stars list-unstyled d-flex justify-content-center mt-2 mb-0">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        @if($products->isEmpty())
                            <div class="item text-center bg-white p-4 rounded">
                                <p class="text-muted">Produk tidak tersedia.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
