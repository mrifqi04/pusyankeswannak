@extends('front.master')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5 border p-4 bg-light">
            <p class="fw-bold fs-5 text-center">Timeline Penerimaan</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tahapan</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pengumuman dan Pembukaan Lamaran</td>
                        <td>07 Desember 2021</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Tahap 1 Seleksi Berkas</td>
                        <td>09 - 13 Desember 2021</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Tahap 2 Ujian Tertulis</td>
                        <td>15 - 19 Desember 2021</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Tahap 3 Wawancara</td>
                        <td>22 - 25 Desember 2021</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Tahap 4 Ujian Praktek (Khusus Petugas Kesehatan Satwa)</td>
                        <td>25 - 30 Desember 2021</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Negoisasi dan Penutupan</td>
                        <td>02 Januari 2022</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection