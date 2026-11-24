<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Inventaris Barang')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; }
        header { background: #2c3e50; color: #fff; padding: 16px 24px; }
        nav a { color: #fff; margin-right: 16px; text-decoration: none; }
        main { max-width: 900px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #ecf0f1; }
        .alert { padding: 10px; margin-bottom: 16px; border-radius: 4px; }
        .success { background: #d4edda; } .error { background: #f8d7da; }
        .err-text { color: #c0392b; font-size: 13px; }
        footer { text-align: center; padding: 16px; color: #777; }
        input, select { width: 100%; padding: 6px; margin: 4px 0 12px; box-sizing: border-box; }
    </style>
</head>
<body>
    <header>
        <h2>Sistem Inventaris Barang</h2>
        <nav>
            <a href="{{ route('barang.index') }}">Daftar Barang</a>
            <a href="{{ route('barang.create') }}">Tambah Barang</a>
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <footer>&copy; {{ date('Y') }} UTS PBO - RIZKI MAULANA 20251020046</footer>
</body>
</html>