<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/app.css') }}">
    <style>
        #banner {
            background: linear-gradient(rgba(0, 0, 0, 0.5), #00965c),
                url('{{ asset('assets/bg.jpeg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>
    <link rel="shrotcut icon" href="{{ asset('img/logo.png') }}">
</head>

<body>
    <section id="banner">
        {{-- <img src="{{ asset('img/logo.png') }}" id="logo"> --}}
        <div class="banner-text">
            <h1>MADRASAH ALIYAH</h1>
            <p>DDI SOREANG KELURAHAN SOREANG KECAMATAN LAU KABUPATEN MAROS</p>
            <div class="banner-btn">
                <a href="/login"><span></span>Akses SIakad</a>
            </div>
        </div>
    </section>
    <div id="sideNav">
        <nav>
            <ul>
                <li><a href="#banner">HOME</a></li>
                <li><a href="#feature">FEATURES</a></li>
                <li><a href="#service">SERVICES</a></li>
                <li><a href="#testimonial">TESTIMONIALS</a></li>
                <li><a href="#footer">MEET US</a></li>
            </ul>
        </nav>
    </div>

    <div id="menuBtn">
        <img src="https://i.postimg.cc/L5vc8FW6/menu.png" id="menu">
    </div>

    <!-- Features -->
    <section id="feature">
        <div class="title-text">
            <p>KEUNGGULAN KAMI</p>
            <h1>Mengapa Memilih Sekolah Inklusif Kami</h1>
        </div>
        <div class="features-box">
            <div class="features">
                <h1>Tenaga Pendidik Berpengalaman</h1>
                <div class="features-desc">
                    <div class="feature-icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <div class="feature-text">
                        <p>Tim pengajar berpengalaman dan penuh empati kami berkomitmen untuk menyediakan pendidikan
                            berkualitas bagi siswa dengan berbagai kemampuan, memastikan bahwa tidak ada yang
                            tertinggal.</p>
                    </div>
                </div>
                <h1>Pendaftaran Online Mudah</h1>
                <div class="features-desc">
                    <div class="feature-icon">
                        <i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="feature-text">
                        <p>Dengan proses pendaftaran online yang sederhana, para orang tua dapat dengan mudah
                            mendaftarkan anak mereka untuk mengikuti pelajaran, menjadikan semuanya lebih praktis.</p>
                    </div>
                </div>
                <h1>Peluang Belajar Inklusif</h1>
                <div class="features-desc">
                    <div class="feature-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="feature-text">
                        <p>Kami percaya pada pendidikan inklusif yang merayakan keberagaman. Sekolah kami memberikan
                            lingkungan yang mendukung agar semua siswa dapat berkembang dan belajar bersama.</p>
                    </div>
                </div>
            </div>
            <div class="features-img">
                <img src="{{ asset('assets/ft1.jpeg') }}">
            </div>
        </div>
    </section>

    <!-- Service -->
    <section id="service">
        <div class="title-text">
            <p>PRESTASI</p>
            <h1>Prestasi Terbaru Kami</h1>
        </div>
        <div class="service-box">
            @foreach ($prestasi as $item)
                <div class="single-service">
                    <img src="{{ asset($item->gambar) }}">
                    <div class="overlay"></div>
                    <div class="service-desc">
                        <h3>{{ $item->judul }}</h3>
                        <hr>
                        <p>{{ $item->desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Testimonial -->
    {{-- <section id="testimonial">
        <div class="title-text">
            <p>TESTIMONIALS</p>
            <h1>What Client Says</h1>
        </div>
        <div class="testimonial-row">
            <div class="testimonial-col">
                <div class="user">
                    <img src="https://i.postimg.cc/KzhS9NLF/img-1.jpg">
                    <div class="user-info">
                        <h4>KEN NORMAN <i class="fa fa-twitter"></i></h4>
                        <small>@kennorman</small>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eius veniam deserunt obcaecati
                    corporis fugiat consectetur a exercitationem vero, iure sapiente, rem assumenda beatae itaque sunt
                    excepturi voluptate nulla tenetur.</p>
            </div>
            <div class="testimonial-col">
                <div class="user">
                    <img src="https://i.postimg.cc/G3QwQvpw/img-2.jpg">
                    <div class="user-info">
                        <h4>Liara Karian<i class="fa fa-twitter"></i></h4>
                        <small>@liarakarian</small>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eius veniam deserunt obcaecati
                    corporis fugiat consectetur a exercitationem vero. iure sapiente, rem assumenda beatae itaque sunt
                    excepturi voluptate nulla tenetur.</p>
            </div>
            <div class="testimonial-col">
                <div class="user">
                    <img src="https://i.postimg.cc/rpr2CbDQ/img-3.jpg">
                    <div class="user-info">
                        <h4>Ricky Danial<i class="fa fa-twitter"></i></h4>
                        <small>@rickydanial</small>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eius veniam deserunt obcaecati
                    corporis fugiat consectetur a exercitationem vero, iure sapiente, rem assumenda beatae itaque sunt
                    excepturi voluptate nulla tenetur.</p>
            </div>
        </div>

    </section> --}}

    <!-- footer -->
    <section id="footer">
        <img src="{{ asset('img/logo.png') }}" class="footer-img">
        <div class="title-text">
            <p>HUBUNGI KAMI</p>
            <h1>Kunjungi Kami Hari Ini</h1>
        </div>
        <div class="footer-row">
            <div class="footer-left">
                <h1>Jam Operasional</h1>
                <p><i class="fa fa-clock-o"></i>Senin hingga Jumat - 9 pagi hingga 9 malam</p>
                <p><i class="fa fa-clock-o"></i>Sabtu dan Minggu - 8 pagi hingga 11 malam</p>
            </div>
            <div class="footer-right">
                <h1>Hubungi Kami</h1>
                <p>#30 Jalan ABC, Kota XYZ ID<i class="fa fa-map-marker"></i></p>
                <p>contoh@website.com<i class="fa fa-paper-plane"></i></p>
                <p>+620123456789<i class="fa fa-phone"></i></p>
            </div>
        </div>
        <div class="social-links">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-youtube-play"></i>
            <p>Copyright Shahriar Ahmmed</p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="{{ asset('assets/app.js') }}"></script>
</body>

</html>
