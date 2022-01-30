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
        @foreach ($jobs as $job)
        <div class="col">
            <div class="card text-center">
                <a href="#"><img src="{{ URL::asset('assets/img/' . $job->gambar) }}" class="card-img-top"
                        data-toggle="modal" data-target="#{{ Auth::check() ? 'uraian' . $job->id : 'login_register'}}"
                        alt="..." /></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $job->nama_pekerjaan }}</h5>
                </div>

                <div class="modal fade" id="uraian{{ $job->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $job->nama_pekerjaan }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <text class="fw-bold">Uraian Umum Pekerjaan</text></br>
                                {{ $job->uraian_umum_pekerjaan }}

                                </br></br>

                                <text class="fw-bold">Persyaratan Khusus</text></br>
                                {{ $job->persyaratan_khusus }}
                            </div>

                            <div class="modal-footer">
                                <a href="{{ route('form-pendaftaran', $job->id) }}">
                                    <button type="button" class="btn btn-primary">DAFTAR SEKARANG!</button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="modal fade" id="login_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
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
                        <a href="{{ route('user-login') }}">
                            <button type="button" class="btn btn-secondary">MASUK</button>
                        </a>
                        <a href="{{ route('user-register') }}">
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