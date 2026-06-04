@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">

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
        <div class="card mb-4">
            <div class="card-header">
                <h3>Tabel Data Point</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="tabledatapoint">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tempat</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Tanggal dibuat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($points as $p)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $p['name'] }}</td>
                                            <td>{{ $p['description'] }}</td>
                                            <td>
                                                <input type="image" src="{{ asset('storage/images') .
                            '/' . $p['image'] }}" alt="" width="200">
                                            </td>
                                            <td>{{ $p['created_at'] }}</td>
                                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                    <h3>Tabel Data Polyline</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped" id="tabledatapolyline">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tempat</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Tanggal dibuat</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($polylines as $pl)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $pl['name'] }}</td>
                                                    <td>{{ $pl['description'] }}</td>
                                                    <td>
                                                        <input type="image" src="{{ asset('storage/images') .
                                '/' . $pl['image'] }}" alt="" width="200">
                                                    </td>
                                                    <td>{{ $pl['created_at'] }}</td>
                                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>

        <div class="card  mb-4">

            <div class="card-header m">
                <h3>Tabel Data Polygon</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="tabledatapolygon">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tempat</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Tanggal dibuat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($polygons as $pg)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pg['name'] }}</td>
                                            <td>{{ $pg['description'] }}</td>
                                            <td>
                                                <input type="image" src="{{ asset('storage/images') .
                            '/' . $pg['image'] }}" alt="" width="200">
                                            </td>
                                            <td>{{ $pg['created_at'] }}</td>
                                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script>
        new DataTable('#tabledatapoint');
        new DataTable('#tabledatapolyline');
        new DataTable('#tabledatapolygon');
    </script>
@endsection