@extends('layout')

@section('content')
<section class="entry-gate" id="entryGate" aria-label="Pembuka Website">
    <div class="entry-noise"></div>
    <div class="entry-orbit entry-orbit-a"></div>
    <div class="entry-orbit entry-orbit-b"></div>
    <div class="entry-orbit entry-orbit-c"></div>
    <div class="entry-pulse"></div>

    <div class="entry-core" data-stagger="0.12">
        <span class="entry-kicker stagger-item">Culinary Motion Experience</span>
        <h1 class="stagger-item">Foodies Flavor Portal</h1>
        <p class="stagger-item">
            Meluncur ke dunia resep dengan transisi rasa, warna, dan ritme visual yang bergerak secara organik.
        </p>
        <div class="entry-actions stagger-item">
            <button type="button" class="btn-modern" id="enterFoodies">Masuk ke Website</button>
            <button type="button" class="entry-skip" id="skipGate">Lewati Intro</button>
        </div>
    </div>
</section>

<section class="hero-section reveal-up" data-parallax="0.08">
    <div class="hero-flare hero-flare-a" aria-hidden="true"></div>
    <div class="hero-flare hero-flare-b" aria-hidden="true"></div>
    <div class="hero-panel" data-stagger="0.08">
        <span class="hero-kicker stagger-item">Resep Semua Makanan</span>
        <h1 class="stagger-item">Selamat Datang di Foodies</h1>
        <p class="stagger-item">Temukan dan bagikan resep lezat dengan dunia!</p>
        <a href="{{ route('recipes.index') }}" class="btn-modern stagger-item">Jelajahi Resep</a>
    </div>
</section>

<section class="content-surface section-block reveal-up mt-4" id="about" data-parallax="0.03">
    <div class="row align-items-center g-4">
        <div class="col-lg-5">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Foodies" class="about-image">
        </div>
        <div class="col-lg-7 about-copy">
            <h2 class="section-title mb-3">Tentang Foodies</h2>
            <p>Selamat datang di Foodies, tujuan utama Anda untuk menemukan dan berbagi resep lezat dari seluruh dunia!
Tujuan kami adalah menghubungkan orang melalui makanan dan menginspirasi kreativitas kuliner di setiap dapur.</p>
            <p> Apakah Anda seorang koki profesional atau koki rumahan, Foodies menawarkan sesuatu untuk semua orang. Jelajahi koleksi resep kami yang luas dan mulai perjalanan kuliner Anda hari ini.</p>
        </div>
    </div>
</section>

<section class="content-surface section-block reveal-up" id="featured-recipes" data-parallax="0.02">
    <h2 class="section-title text-center">Resep Pilihan</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="modern-card">
                <img src="{{ asset('images/carbonara.jpg') }}" alt="Spaghetti Carbonara">
                <div class="card-body p-3">
                    <h3 class="card-title">Spaghetti Carbonara</h3>
                    <p class="card-text">Hidangan pasta creamy dan gurih, cocok untuk makan siang maupun makan malam.</p>
                    <a href="{{ route('recipes.index') }}" class="btn-modern mt-1">Lihat Semua Resep</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="modern-card">
                <img src="{{ asset('images/panna_cotta.jpg') }}" alt="Panna Cotta">
                <div class="card-body p-3">
                    <h3 class="card-title">Panna Cotta</h3>
                    <p class="card-text">Dessert lembut dengan rasa manis seimbang dan tampilan elegan.</p>
                    <a href="{{ route('recipes.index') }}" class="btn-modern mt-1">Lihat Semua Resep</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="modern-card">
                <img src="{{ asset('images/ramen.jpg') }}" alt="Ramen">
                <div class="card-body p-3">
                    <h3 class="card-title">Ramen</h3>
                    <p class="card-text">Mie berkuah kaya rasa dengan topping lengkap yang menggugah selera.</p>
                    <a href="{{ route('recipes.index') }}" class="btn-modern mt-1">Lihat Semua Resep</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-surface section-block reveal-up" id="testimonials" data-parallax="0.02">
    <h2 class="section-title text-center">Apa Kata Pelanggan Kami</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <article class="testimonial-card">
                <img src="{{ asset('images/ferdi1.jpg') }}" alt="Ferdi" class="avatar">
                <blockquote class="mb-3">"Resep-resepnya jelas dan mudah dipraktikkan. Hasil masakan saya jadi lebih konsisten."</blockquote>
                <h5 class="mb-1">Ferdi</h5>
                <small class="text-muted">Pencinta Kuliner</small>
            </article>
        </div>

        <div class="col-md-4">
            <article class="testimonial-card">
                <img src="{{ asset('images/raja.jpg') }}" alt="Raja" class="avatar">
                <blockquote class="mb-3">"Situs favorit saya untuk cari inspirasi menu rumahan. Navigasinya juga enak dipakai."</blockquote>
                <h5 class="mb-1">Raja</h5>
                <small class="text-muted">Koki Rumahan</small>
            </article>
        </div>

        <div class="col-md-4">
            <article class="testimonial-card">
                <img src="{{ asset('images/alfred.jpg') }}" alt="Alfred" class="avatar">
                <blockquote class="mb-3">"Tampilannya sekarang terasa premium, dan koleksi resepnya bikin betah jelajah lama."</blockquote>
                <h5 class="mb-1">Alfred</h5>
                <small class="text-muted">Penggemar Baking</small>
            </article>
        </div>
    </div>
</section>

<script>
    (() => {
        const gate = document.getElementById('entryGate');
        const enterButton = document.getElementById('enterFoodies');
        const skipButton = document.getElementById('skipGate');

        if (!gate || !enterButton || !skipButton) {
            return;
        }

        const seenKey = 'foodies_intro_seen_v1';
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const alreadySeen = sessionStorage.getItem(seenKey) === '1';

        if (alreadySeen) {
            gate.remove();
            return;
        }

        document.body.classList.add('gate-lock');

        const closeGate = () => {
            if (gate.classList.contains('is-leaving')) {
                return;
            }

            gate.classList.add('is-leaving');
            sessionStorage.setItem(seenKey, '1');

            window.setTimeout(() => {
                gate.remove();
                document.body.classList.remove('gate-lock');
            }, 900);
        };

        enterButton.addEventListener('click', closeGate);
        skipButton.addEventListener('click', closeGate);

        if (!reduceMotion) {
            gate.addEventListener('mousemove', (event) => {
                const x = (event.clientX / window.innerWidth) - 0.5;
                const y = (event.clientY / window.innerHeight) - 0.5;
                gate.style.setProperty('--gate-shift-x', `${x * 24}px`);
                gate.style.setProperty('--gate-shift-y', `${y * 24}px`);
            });
        }

        window.setTimeout(closeGate, reduceMotion ? 1800 : 5600);
    })();
</script>
@endsection
