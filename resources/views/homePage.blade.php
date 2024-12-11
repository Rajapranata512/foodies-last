@extends('layout')
@section('content')

<body>
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="title-block">
                <h1>Selamat Datang di Foodies</h1>
                <p class="lead">Foodies for a Better Future<p>
                <a href="{{ url('/allRecipes') }}" style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: white; font-weight: bold; text-decoration: none; border-radius: 5px; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.1)'; this.style.boxShadow='0 6px 8px rgba(0, 0, 0, 0.2)';"
                onmouseout="this.style.backgroundColor='#007BFF'; this.style.transform='scale(1)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';"
                onmousedown="this.style.backgroundColor='#003f7f'; this.style.transform='scale(1)'; this.style.boxShadow='inset 0 3px 6px rgba(0, 0, 0, 0.3)';"
                onmouseup="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.1)'; this.style.boxShadow='0 6px 8px rgba(0, 0, 0, 0.2)';">
                Jelajahi Resep</a>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <section class="about bg-light py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Section -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="About Us" class="img-fluid rounded shadow">
                </div>
                <!-- Text Section -->
                <div class="col-md-6">
                    <h1><strong>Tentang Foodies</strong></h1>
                    <p class="text-muted">
                        Selamat datang di Foodies for a Better Future, platform yang menyediakan berbagai resep makanan dari berbagai daerah dan negara di seluruh dunia. Misi kami selaras dengan Tujuan Pembangunan Berkelanjutan (TPB/SDGs) dari Perserikatan Bangsa-Bangsa,
                        khususnya dalam mendukung Tujuan 2: Tanpa Kelaparan dan Tujuan 3: Kehidupan Sehat dan Sejahtera.
                        Melalui kekuatan makanan dan gizi, kami bertujuan untuk:
                        Meningkatkan Gizi Global: Dengan berbagi resep bergizi yang menekankan pola makan seimbang dan praktik makanan berkelanjutan.
                        Melestarikan Keberagaman Kuliner: Dengan merayakan kekayaan tradisi kuliner dari berbagai budaya untuk mempererat rasa hormat dan persatuan.
                        Memberdayakan Komunitas: Dengan menyediakan sumber daya dan inspirasi untuk memasak makanan sehat di rumah.
                        Kami percaya bahwa masa depan yang lebih sehat dimulai dengan memahami dan mengapresiasi nilai dari makanan bergizi. Melalui eksplorasi resep dari seluruh dunia, kita bisa belajar untuk tidak hanya memberi asupan terbaik bagi diri sendiri, tetapi juga untuk komunitas dan lingkungan. Bersama-sama,
                        kita bisa mengambil langkah kecil menuju dunia tanpa kelaparan, malnutrisi, dan penyakit akibat pola makan yang tidak sehat.
                        Mari bergabung bersama kami untuk membangun masa depan yang lebih sehat dan berkelanjutan—satu resep pada satu waktu.
                    </p>
                    <p class="text-muted">
                        Apakah Anda seorang koki profesional atau koki rumahan, Foodies menawarkan sesuatu untuk semua orang. Jelajahi koleksi resep kami yang luas dan mulai perjalanan kuliner Anda hari ini.
                </div>
            </div>
        </div>
    </section>

    <!-- Featured receipes-->
    <section class="featured-recipes py-5" id="featured-recipes">
        <div class="container">
            <!-- Section Title -->
            <h2 class="text-center mb-5">Resep Pilihan</h2>

            <div class="row">
                <!-- Recipe Card 1 -->
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <img src="{{ asset('images/carbonara.jpg') }}" class="card-img-top" alt="Recipe 1">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><strong>Spaghetti Carbonara</strong></h5>
                            <p class="card-text flex-grow-1">Hidangan pasta yang creamy dan gurih, sempurna untuk makan malam.</p>
                            <a href="{{route('allRecipes')}}" class="btn btn-warning mt-auto">Lihat semua resep</a>
                        </div>
                    </div>
                </div>

                <!-- Recipe Card 2 -->
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <img src="{{ asset('images/panna_cotta.jpg') }}" class="card-img-top" alt="Recipe 2">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><strong>Panna Cotta</strong></h5>
                            <p class="card-text flex-grow-1">Panna cotta yang lembut dan manis, disajikan dengan saus buah segar, sempurna sebagai pencuci mulut.</p>
                            <a href="{{route('allRecipes')}}" class="btn btn-warning mt-auto">Lihat semua resep</a>
                        </div>
                    </div>
                </div>

                <!-- Recipe Card 3 -->
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <img src="{{ asset('images/ramen.jpg') }}" class="card-img-top" alt="Recipe 3">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><strong>Ramen</strong></h5>
                            <p class="card-text flex-grow-1">Mie ramen yang kaya rasa, dengan kaldu yang lezat dan topping yang menggugah selera. Sempurna untuk makan siang atau makan malam.</p>
                            <a href="{{route('allRecipes')}}" class="btn btn-warning mt-auto">Lihat semua resep</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Testimonials Section -->
<section class="testimonials py-5 bg-light" id="testimonials">
    <div class="container">
        <h2 class="text-center mb-5">Apa Kata Pelanggan Kami</h2>
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="card shadow border-0 text-center">
                    <div class="card-body">
                        <div class="image-container mx-auto mb-3">
                            <img src="{{ asset('images/ferdi1.jpg') }}" alt="Customer 1" class="rounded-circle">
                        </div>
                        <blockquote class="blockquote mb-3">
                            <p class="mb-0">"Resep-resepnya luar biasa! Saya mencoba tiga resep, dan semuanya berhasil dengan sempurna."</p>
                        </blockquote>
                        <h5 class="mb-1">Ferdi</h5>
                        <small class="text-muted">Pencinta Kuliner</small>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <div class="card shadow border-0 text-center">
                    <div class="card-body">
                        <div class="image-container mx-auto mb-3">
                            <img src="{{ asset('images/raja.jpg') }}" alt="Customer 2" class="rounded-circle">
                        </div>
                        <blockquote class="blockquote mb-3">
                            <p class="mb-0">"Ini adalah situs favorit saya untuk mencari inspirasi resep. Petunjuknya sangat jelas."</p>
                        </blockquote>
                        <h5 class="mb-1">Raja</h5>
                        <small class="text-muted">Koki Rumahan</small>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <div class="card shadow border-0 text-center">
                    <div class="card-body">
                        <div class="image-container mx-auto mb-3">
                            <img src="{{ asset('images/alfred.jpg') }}" alt="Customer 3" class="rounded-circle">
                        </div>
                        <blockquote class="blockquote mb-3">
                            <p class="mb-0">"Saya suka betapa mudahnya menemukan dan menyimpan resep favorit saya di website ini"</p>
                        </blockquote>
                        <h5 class="mb-1">Alfred</h5>
                        <small class="text-muted">Penggemar Baking</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</body>
@endsection
