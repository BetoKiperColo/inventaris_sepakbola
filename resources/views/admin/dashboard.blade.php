@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<style>
/* ================= WRAPPER DASHBOARD ================= */
.dashboard-wrapper {
    max-width: 1000px;
    margin: 0 auto;
}

/* ================= STAT BOX ================= */
.dashboard-box {
    display: grid;
    grid-template-columns: 1fr;
    gap: 18px;
    margin-bottom: 35px;
}

/* BARIS BAWAH */
.stat-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

/* ================= CARD STAT ================= */
.stat-card {
    background: #fff;
    border-radius: 14px;
    padding: 18px 22px;
    box-shadow: 0 6px 14px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: 
        transform .35s ease,
        box-shadow .35s ease;
}

/* LIGHT OVERLAY */
.stat-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        120deg,
        rgba(255,255,255,0.35),
        rgba(255,255,255,0.05)
    );
    opacity: 0;
    transition: opacity .35s ease;
}

/* HOVER */
.stat-card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 14px 28px rgba(0,0,0,0.15);
}

.stat-card:hover::after {
    opacity: 1;
}

/* BOX UTAMA */
.stat-main {
    background: linear-gradient(135deg, #f1c40f, #f39c12);
    color: #fff;
}

/* ICON */
.stat-icon {
    font-size: 26px;
    margin-bottom: 8px;
    transition: transform .35s ease;
}

/* ICON ANIM */
.stat-card:hover .stat-icon {
    transform: rotate(-8deg) scale(1.2);
}

/* TEXT */
.stat-text h3 {
    font-size: 22px;
    margin: 0;
}

.stat-text p {
    font-size: 13px;
    margin: 0;
    opacity: .85;
}

/* ================= SLIDER BARANG ================= */
.barang-slider-wrapper {
    position: relative;
    overflow: hidden;
    max-width: 100%;
}

/* SLIDER */
.barang-slider {
    display: flex;
    gap: 20px;
    width: max-content;
    transition: transform .45s cubic-bezier(.4,0,.2,1);
}

/* ================= CARD BARANG ================= */
.barang-card {
    width: 300px;
    flex-shrink: 0;
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 6px 14px rgba(0,0,0,0.08);
    transition: 
        transform .35s ease,
        box-shadow .35s ease;
}

/* HOVER BARANG */
.barang-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 16px 30px rgba(0,0,0,0.18);
}

/* IMAGE */
.barang-card img {
    width: 100%;
    height: 170px;
    object-fit: cover;
    transition: transform .4s ease;
}

.barang-card:hover img {
    transform: scale(1.08);
}

/* BODY */
.barang-body {
    padding: 14px;
    text-align: left;
}

/* ================= BUTTON PANAH ================= */
.slider-btn {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: none;
    background: #f1c40f;
    cursor: pointer;
    z-index: 10;
    box-shadow: 0 6px 14px rgba(0,0,0,0.25);
    transition: 
        background .25s ease,
        transform .25s ease;
}

/* POSISI */
.slider-btn.left { left: -12px; }
.slider-btn.right { right: -12px; }

/* ICON */
.slider-btn i {
    color: #fff;
    font-size: 16px;
}

/* HOVER BUTTON */
.slider-btn:hover {
    background: #f39c12;
    transform: translateY(-50%) scale(1.12);
}
</style>



<div class="dashboard-wrapper">

    <h2>Inventaris Perlengkapan Sekolah Sepak Bola</h2>

    {{-- STAT BOX --}}
    <div class="dashboard-box">

        <div class="stat-card stat-main">
            <div class="stat-icon">
                <i class="fa-solid fa-arrows-rotate"></i>
            </div>
            <div class="stat-text">
                <h3>{{ $persewaanAktif }}</h3>
                <p>Persewaan Aktif</p>
            </div>
        </div>

        <div class="stat-row">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <div class="stat-text">
                    <h3>{{ $totalBarang }}</h3>
                    <p>Total Barang</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <div class="stat-text">
                    <h3>{{ $totalKategori }}</h3>
                    <p>Total Kategori</p>
                </div>
            </div>
        </div>

    </div>

    {{-- DAFTAR BARANG --}}
    <h3>Daftar Barang</h3>

    <div class="barang-slider-wrapper">

        <button class="slider-btn left" onclick="slideBarang(-1)">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <div class="barang-slider" id="barangSlider">
            @foreach($barangs as $barang)
                <div class="barang-card">
                    <img src="{{ asset('storage/'.$barang->gambar) }}">
                    <div class="barang-body">
                        <h4>{{ $barang->nama_barang }}</h4>
                        <p>Stok: {{ $barang->stok }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="slider-btn right" onclick="slideBarang(1)">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

    </div>

</div>

<script>
let posisi = 0;
function slideBarang(arah) {
    const slider = document.getElementById('barangSlider');
    const cardWidth = slider.children[0].offsetWidth + 20;
    const maxScroll = slider.scrollWidth - slider.parentElement.offsetWidth;

    posisi += arah * cardWidth * 3;
    if (posisi < 0) posisi = 0;
    if (posisi > maxScroll) posisi = maxScroll;

    slider.style.transform = `translateX(-${posisi}px)`;
}
</script>

@endsection
