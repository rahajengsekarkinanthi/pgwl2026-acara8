@extends('layouts.template')

@section('styles')
    <style>
        body {
            background-color: #f5f7fb;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(135deg, #89a2ebff, #224abe);
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .table th {
            background-color: #f1f3f9;
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
                <h3>Data Lokasi</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tempat</th>
                            <th>Deskripsi</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tugu Yogyakarta</td>
                            <td>Landmark ikonik di pusat kota Yogyakarta.</td>
                            <td>Jl. Jend. Sudirman, Gowongan, Kec. Jetis, Kota Yogyakarta</td>
                            <td><img src="{{ asset('images/tugu_yogyakarta.jpg') }}" width="150"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Malioboro</td>
                            <td>Pusat perbelanjaan dan jalan paling terkenal di Jogja.</td>
                            <td>Jl. Malioboro, Sosromenduran, Gedong Tengen, Kota Yogyakarta</td>
                            <td><img src="{{ asset('images/malioboro.png') }}" width="150"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Keraton Yogyakarta</td>
                            <td>Istana resmi Kesultanan Ngayogyakarta Hadiningrat.</td>
                            <td>Jl. Rotowijayan Blok No. 1, Panembahan, Kec. Kraton, Kota Yogyakarta</td>
                            <td><img src="{{ asset('images/keraton_yogyakarta.jpg') }}" width="150"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Benteng Vredeburg</td>
                            <td>Museum sejarah perjuangan nasional yang menempati bekas benteng pertahanan kolonial Belanda.
                            </td>
                            <td>Jl. Margo Mulyo No.6, Ngupasan, Kec. Gondomanan, Kota Yogyakarta</td>
                            <td><img src="{{ asset('images/benteng_vredeburg.jpg') }}" width="150"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

</body>

</html>