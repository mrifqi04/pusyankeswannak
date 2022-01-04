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

                </br>

                <h5>RATA RATA NILAI TES TERTULIS</h5>
                <div class="container row row-cols-4 row-cols-md-4 g-6 mb-2">
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Keamanan Kantor</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Kebersihan Kantor</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Kesehatan Satwa</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Laboratorium</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Teknis Perawat Satwa</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas IPAL</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Keurmaster</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Mekanik dan Listrik</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Customer Relation</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Informasi</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Petugas Penerima Tamu</p>

                    </div>
                    <div class="border p-3 bg-light text-center">
                        <p class="fw-bold">Tenaga Supir</p>

                    </div>
                </div>

                </br>

                <h5>LOG ACTIVITY ADMIN</h5>
                <table class="table table-striped table-bordered" id="">
                    <thead>
                        <tr>
                            <th>TIMESTAMP</th>
                            <th>USERNAME</th>
                            <th>NAMA</th>
                            <th>AKTIVITAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
                </p>
            </div>
        </div>
    </div>
</main>
@endsection