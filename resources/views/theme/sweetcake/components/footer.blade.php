<style>
    .cake-footer {
        background: linear-gradient(to right, #4e342e, #6d4c41);
        color: #f5f5f5;
        font-family: 'Poppins', sans-serif;
        padding: 70px 0 40px;
        clip-path: polygon(0 0, 100% 5%, 100% 100%, 0% 100%);
    }

    .cake-footer h4 {
        color: #ffe0b2;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .cake-footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .cake-footer ul li {
        margin-bottom: 10px;
    }

    .cake-footer ul li a {
        color: #d7ccc8;
        text-decoration: none;
        transition: 0.3s;
    }

    .cake-footer ul li a:hover {
        color: #fff;
    }

    .cake-footer .logo img {
        max-width: 160px;
        margin-bottom: 20px;
    }

    .cake-footer .social-icons {
        list-style: none;
        display: flex;
        gap: 16px;
        padding: 0;
        margin-top: 20px;
    }

    .cake-footer .social-icons li a {
        color: #ffe0b2;
        font-size: 20px;
        transition: 0.3s;
    }

    .cake-footer .social-icons li a:hover {
        color: #ffffff;
    }

    .footer-columns {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 40px;
        padding-top: 30px;
    }

    .footer-section {
        position: relative;
        top: 0;
    }

    .footer-section:nth-child(2) {
        top: 10px;
    }

    .footer-section:nth-child(3) {
        top: 20px;
    }

    .footer-section:nth-child(4) {
        top: 10px;
    }

    .footer-section.logo-contact {
        padding-left: 20px;
        padding-right: 10px;
    }

    .under-footer {
        text-align: center;
        margin-top: 50px;
        padding-top: 25px;
        border-top: 1px solid #795548;
        font-size: 14px;
        color: #a1887f;
    }

    .under-footer a {
        color: #ffe0b2;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .cake-footer {
            clip-path: none;
        }

        .footer-section {
            top: 0 !important;
        }

        .footer-columns {
            gap: 20px;
        }

        .footer-section.logo-contact {
            padding-left: 10px;
            padding-right: 10px;
        }
    }
</style>

<footer class="cake-footer">
    <div class="container">
        <div class="footer-columns">
            <!-- Kolom 1: Logo & Kontak -->
            <div class="footer-section logo-contact">
                <div class="logo">
                    <img src="{{ asset('theme/sweetcake/assets/images/white-logo.png') }}" alt="YuhuCake Logo">
                </div>
                <ul>
                    <li><a href="#">Jl. Kartini No.123<br>Kota Tegal, Jawa Tengah</a></li>
                    <li><a href="mailto:yuhucake@company.com">yuhucake@company.com</a></li>
                    <li><a href="tel:0810-0207-0340">0810-0207-0340</a></li>
                </ul>
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>

            <!-- Kolom 2 -->
            <div class="footer-section">
                <h4>Kategori Belanja</h4>
                <ul>
                    <li><a href="#">Kue Ulang Tahun</a></li>
                    <li><a href="#">Kue Kering</a></li>
                    <li><a href="#">Kue Custom</a></li>
                </ul>
            </div>

            <!-- Kolom 3 -->
            <div class="footer-section">
                <h4>Tautan Penting</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Bantuan</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 4 -->
            <div class="footer-section">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="#">Panduan</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Pengiriman</a></li>
                    <li><a href="#">Lacak Pesanan</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer bawah -->
        <div class="under-footer">
            <p>
                &copy; {{ date('Y') }} YuhuCake. All Rights Reserved.<br>
                Design inspired by <a href="https://templatemo.com" target="_blank">TemplateMo</a> |
                Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
</footer>