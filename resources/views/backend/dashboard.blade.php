@extends('backend.master')

@section('content')
<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>DASHBOARD</h4>
        </div>
        <hr />
        <div class="row">
            <div class="col-12">
                <p>
                <h5>STATISTIK DATA PELAMAR</h5>
                <hr>
                </br>

                <h5>RATA RATA NILAI TES TERTULIS</h5>
                <hr>
                <div class="container row row-cols-4 row-cols-md-4 g-6 mb-2">
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Keamanan Kantor</p>
                        <h3 class="average" data-id="12">{{$average_tkk }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Kebersihan Kantor</p>
                        <h3 class="average">{{$average_tkbk }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Kesehatan Satwa</p>
                        <h3 class="average">{{$average_pks }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Laboratorium</p>
                        <h3 class="average">{{$average_tl }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Teknis Perawat Satwa</p>
                        <h3 class="average">{{ $average_ttps }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas IPAL</p>
                        <h3 class="average">{{$average_ipal }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Keurmaster</p>
                        <h3 class="average">{{$average_pk }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Mekanik dan Listrik</p>
                        <h3 class="average">{{$average_tmdl }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Customer Relation</p>
                        <h3 class="average">{{ $average_pcr }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Informasi</p>
                        <h3 class="average">{{$average_pi }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Penerima Tamu</p>
                        <h3 class="average">{{$average_ppt }}</h3>
                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Supir</p>
                        <h3 class="average">{{$average_ts }}</h3>
                    </div>
                </div>

                </br>

                <h5>LOG ACTIVITY ADMIN</h5>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="container" ;>
                            <table class="table table-striped table-bordered" id="sortTable">
                                <thead>
                                    <tr>
                                        <th>TIMESTAMP</th>
                                        <th>NAMA</th>
                                        <th>AKTIVITAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->created_at }}</td>
                                        <td>{{ $log->user->name }}</td>
                                        <td>{{ $log->aktifitas }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <script>
                            $("#sortTable").DataTable();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection