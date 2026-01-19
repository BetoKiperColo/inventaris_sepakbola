<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f4f6f9;
    overflow: hidden; /* PENTING */
}
/* ================= ADMIN PAGE (NON DASHBOARD) ================= */
.admin-page h2 {
    margin: 0 0 20px;
    font-size: 24px;
    font-weight: bold;
    color: #1f2937;
}

/* CARD WRAPPER */
.admin-page .card {
    background: #fff;
    border-radius: 14px;
    padding: 22px;
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
    margin-bottom: 25px;
    animation: fadeUp .4s ease;
}

/* HEADER ATAS HALAMAN */
.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

/* ================= BUTTON ================= */
.btn, 
.action button,
.action a{
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: .3s;
    text-decoration: none;
    justify-content: center;
    height: 34px;
    line-height: 1;
}

.btn-add {
    background: #16a34a;
    color: white;
}
.btn-add:hover { background: #15803d; }

.btn-edit {
    background: #2563eb;
    color: white;
}
.btn-edit:hover { background: #1d4ed8; }

.btn-delete {
    background: #dc2626;
    color: white;
}
.btn-delete:hover { background: #b91c1c; }

/* ================= TABLE ================= */
.admin-page .table {
    border-radius: 12px;
    overflow: hidden;
}

.admin-page .table th {
    background: #f3f4f6;
    font-weight: bold;
}

.admin-page .table tr:hover {
    background: #f9fafb;
}

/* ================= ACTION ================= */
.action {
    display: flex;
    gap: 8px;
}

/* ================= FORM ================= */
.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 6px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px 12px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
    outline: none;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #f1c40f;
    box-shadow: 0 0 0 3px rgba(241,196,15,.25);
}

/* ================= ALERT ================= */
.alert-success {
    background: #dcfce7;
    color: #166534;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* ================= ANIMATION ================= */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ================= NAVBAR ================= */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 70px;
    background: #f1c40f;
    display: flex;
    align-items: center;
    padding: 0 25px;
    box-shadow: 0 4px 10px rgba(0,0,0,.1);
    z-index: 1000;
}

.navbar-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.navbar-logo {
    width: 55px;
    height: 55px;
    border-radius: 50%;
}

.title {
    font-size: 20px;
    font-weight: bold;
}

/* ================= SIDEBAR ================= */
.sidebar {
    position: fixed;
    top: 70px;               /* DI BAWAH NAVBAR */
    left: 0;
    width: 240px;
    height: calc(100vh - 70px);
    background: linear-gradient(180deg, #8b0000, #a4161a);
    color: #fff;
    display: flex;
    flex-direction: column;
    z-index: 900;
}

.sidebar-header {
    padding: 20px;
    font-size: 18px;
    font-weight: bold;
    border-bottom: 1px solid rgba(255,255,255,.2);
}

.sidebar-menu {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 6px;
    padding: 10px;
    overflow-y: auto; /* JIKA MENU BANYAK */
}

.sidebar-menu a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 15px;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    transition: .3s;
}

.sidebar-menu a:hover {
    background: rgba(255,255,255,.15);
    transform: translateX(6px);
}

.sidebar-footer {
    padding: 15px;
    border-top: 1px solid rgba(255,255,255,.2);
}

.logout-sidebar {
    width: 100%;
    background: #f1c40f;
    border: none;
    padding: 10px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
}

.logout-sidebar:hover {
    background: #f39c12;
}

/* ================= CONTENT ================= */
.content {
    position: fixed;
    top: 70px;
    left: 240px;
    right: 0;
    bottom: 0;
    padding: 30px;
    overflow-y: auto; /* HANYA CONTENT YANG SCROLL */
}

/* ================= FOOTER ================= */
.footer {
    margin-top: 40px;
    padding: 15px;
    text-align: center;
    font-size: 13px;
    color: #6b7280;
    border-top: 1px solid #e5e7eb;
    background: #f9fafb;
}
/* ================= TABLE ================= */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
        }

        .table th {
            background: #e5e7eb;
            padding: 12px;
            text-align: left;
        }

        .table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        /* ================= LAYOUT TAMBAH PERSEWAAN ================= */
        .sewa-layout {
            display: flex;
            gap: 25px;
            align-items: flex-start;
        }

        .sewa-left {
            flex: 2;
        }

        .sewa-right {
            flex: 1;
        }
</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="navbar-left">
        <img src="{{ asset('FIX 1.png') }}" class="navbar-logo">
        <span class="title">Inventaris Perlengkapan Sekolah Sepak Bola</span>
    </div>
</div>

<!-- LAYOUT -->
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-header">Inventaris</div>

        <div class="sidebar-menu">
            <a href="/admin/dashboard"><i class="fa-solid fa-house"></i> Dashboard</a>
            <a href="/admin/kategori"><i class="fa-solid fa-layer-group"></i> Kategori</a>
            <a href="/admin/barang"><i class="fa-solid fa-box"></i> Barang</a>
            <a href="/admin/peminjaman"><i class="fa-solid fa-arrows-rotate"></i> Peminjaman</a>
            <a href="/admin/peminjaman/riwayat"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Transaksi</a>
        </div>

        <div class="sidebar-footer">
            <form action="/logout" method="GET">
                @csrf
                <button class="logout-sidebar">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENT -->
    <main class="content admin-page">
        @yield('content')

        <footer class="footer">
            © {{ date('Y') }} Inventaris Perlengkapan Sekolah Sepak Bola | Dhani
        </footer>
    </main>

</div>

</body>
</html>
