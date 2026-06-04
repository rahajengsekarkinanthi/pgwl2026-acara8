@extends('layouts.template')

@section('styles')
    <style>
        body {
            background-color: #D8EFD3;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(135deg, #95D2B3, #55AD9B);
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .table th {
            background-color: #D8EFD3;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f8f9fc;
            transition: 0.2s;
        }

    </style>
@endsection

@section('content')

    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h3>Aplikasi Geospasial CRUD</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <p>Aplikasi ini dibuat untuk memenuhi tugas mata kuliah Praktikum Pemrograman Geospasial Web Lanjut.
                        Aplikasi ini menampilkan peta interaktif yang menunjukkan objek dengan geometri titik, garis,
                        dan area yang dapat ditambah, ditampilkan, diubah, dan dihapus. Aplikasi ini dikembangkan dengan
                        menggunakan Laravel dan PostgreSQL - PostGIS.</p>
                </table>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Jumlah Point</h3>
                    </div>
                    <div class="card-body text-center">
                        <h1>
                            {{ $points_count }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Jumlah Polyline</h3>
                    </div>
                    <div class="card-body text-center">
                        <h1>
                            {{ $polylines_count }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Jumlah Polygon</h3>
                    </div>
                    <div class="card-body text-center">
                        <h1>
                            {{ $polygons_count }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Jumlah User</h3>
                    </div>
                    <div class="card-body text-center">
                        <h1>
                            {{ $users_count }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

</body>

</html>