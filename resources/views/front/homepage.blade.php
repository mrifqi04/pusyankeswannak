@extends('front.master')

@section('content')
<img src="{{ URL::asset('assets/img/homepage_1.png') }}" class="img-fluid" alt="">

<br /><br /><br /><br />

<div class="container">

    <div class="text-center">
        <a href="{{ route('timeline') }}">
            <button type="button" class="btn btn-outline-secondary btn-lg me-2">Timeline Penerimaan</button>
        </a>
        <a href="{{ route('persyaratan') }}">
            <button type="button" class="btn btn-outline-secondary btn-lg">Persyaratan Umum</button>
        </a>
    </div>

    <br /><br /><br /><br />

    <div class="row row-cols-4 row-cols-md-4 g-6">
        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Petugas Kesehatan Satwa.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Petugas Kesehatan Satwa</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Tenaga Laboratorium.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Tenaga Laboratorium</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Tenaga Teknis Perawat Satwa.png') }}"
                        class="card-img-top" data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Tenaga Teknis Perawat Satwa</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Petugas IPAL.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Petugas IPAL</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Petugas Keurmaster.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Petugas Keurmaster</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Tenaga Mekanik dan Listrik.png') }}"
                        class="card-img-top" data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Tenaga Mekanik dan Listrik</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Petugas Customer Relation.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Petugas Customer Relation</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Petugas Informasi.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Petugas Informasi</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Tenaga Supir.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Tenaga Supir</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Petugas Penerima Tamu.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Petugas Penerima Tamu</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Tenaga Keamanan Kantor.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Tenaga Keamanan Kantor</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/Tenaga Kebersihan Kantor.png') }}" class="card-img-top"
                        data-toggle="modal" data-target="#exampleModalLong" alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">Tenaga Kebersihan Kantor</h5>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Notifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-center">
                        Anda belum dapat mendaftar lowongan pekerjaan.
                        Silahkan Daftar/Masuk akun terlebih dahulu.
                    </div>

                    <div class="modal-footer">
                        <a href="masuk-akun-pelamar.php">
                            <button type="button" class="btn btn-secondary">MASUK</button>
                        </a>
                        <a href="daftar-akun-pelamar.php">
                            <button type="button" class="btn btn-primary">DAFTAR</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<br /><br /><br /><br />
@endsection