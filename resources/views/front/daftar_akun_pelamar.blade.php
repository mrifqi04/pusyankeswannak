@extends('front.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="signup-form">
                <form action="{{ route('store-register') }}" method="POST" class="mt-5 border p-4 bg-light shadow needs-validated">
                    @csrf
                    <h4 class="mb-4 text-center">DAFTAR AKUN</h4>
                    <div class="row">

                        <div class="mb-3 col-md-12">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" maxlength="16"
                                placeholder="Nomor Induk Kependudukan" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nama Lengkap (Sesuai KTP)" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Kata Sandi</label>
                            <input type="password" name="password" class="form-control" minlength="6" maxlength="10"
                                placeholder="Kata Sandi" required>
                        </div>

                        <div class="col-md-12 my-3">
                            <button class="btn btn-primary float-end">SIMPAN</button>
                        </div>
                    </div>
                </form>
                <p class="text-center mt-3 text-secondary">Sudah memiliki akun? <a href="masuk-akun-pelamar.php">
                        Masuk</a></p>
            </div>
        </div>
    </div>
</div>
@endsection