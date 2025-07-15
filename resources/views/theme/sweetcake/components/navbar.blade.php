<style>
    body {
        margin: 0;
        padding: 0;
    }

    .header-area {
        background-color: #5d4037;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 0;
        padding: 0;
        width: 100%;
        position: relative;
        z-index: 999;
    }

    .main-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        padding: 20px 80px; /* ➕ Tambahkan tinggi dan lebarkan kiri-kanan */
        box-sizing: border-box;
        width: 100%;
    }

    .main-nav .logo img {
        height: 75px; /* ➕ Logo lebih tinggi */
    }

    .main-nav ul.nav {
        display: flex;
        align-items: center;
        gap: 30px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .main-nav ul.nav li a {
        color: #fff3e0;
        font-weight: 500;
        padding: 14px 20px; /* ➕ Ukuran klik area lebih besar */
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        font-size: 17px;
    }

    .main-nav ul.nav li a:hover,
    .main-nav ul.nav li a.active {
        background-color: #8d6e63;
        color: #ffffff;
    }

    .submenu {
        position: relative;
    }

    .submenu ul {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #6d4c41;
        border-radius: 6px;
        padding: 10px;
        display: none;
        z-index: 999;
    }

    .submenu:hover ul {
        display: block;
    }

    .submenu ul li a {
        color: #fff3e0;
        padding: 10px 15px;
        display: block;
        font-size: 16px;
    }

    .submenu ul li a:hover {
        background-color: #a1887f;
        color: #fff;
    }

    .menu-trigger {
        display: none;
        font-weight: bold;
        color: #fff3e0;
        cursor: pointer;
        font-size: 18px;
    }

    @media (max-width: 991px) {
        .main-nav {
            padding: 20px;
        }

        .main-nav ul.nav {
            flex-direction: column;
            align-items: flex-start;
            background-color: #5d4037;
            width: 100%;
            display: none;
        }

        .main-nav.active ul.nav {
            display: flex;
        }

        .menu-trigger {
            display: inline-block;
        }
    }
</style>

<header class="header-area">
    <nav class="main-nav" id="mainNav">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('theme/' . $themeFolder . '/assets/images/logo.png') }}" alt="YuhuCake Logo">
        </a>

        <!-- Menu -->
        <ul class="nav">
            <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ request()->is('/') ? '#men' : route('home') . '#men' }}">Men's</a></li>
            <li><a href="{{ request()->is('/') ? '#women' : route('home') . '#women' }}">Women's</a></li>
            <li><a href="{{ request()->is('/') ? '#kids' : route('home') . '#kids' }}">Kid's</a></li>
            <li class="submenu">
                <a href="javascript:void(0);">Pages</a>
                <ul>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                    <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                    <li><a href="{{ route('categories') }}">Categories</a></li>
                </ul>
            </li>
            <li><a href="{{ request()->is('/') ? '#explore' : route('home') . '#explore' }}">Explore</a></li>
        </ul>

        <!-- Mobile Menu Trigger -->
        <div class="menu-trigger" onclick="toggleMenu()">☰ Menu</div>
    </nav>
</header>

<script>
    function toggleMenu() {
        document.getElementById('mainNav').classList.toggle('active');
    }
</script>