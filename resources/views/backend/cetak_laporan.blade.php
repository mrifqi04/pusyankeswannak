@extends('backend.master')

@section('content')
<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>CETAK LAPORAN</h4>
        </div>
        <hr />
        <div class="row">
            <div class="col-12">
                <form action="{{ route('export-laporan') }}" method="post">
                    @csrf
                    <label for="input-form-laporan" class="form-label">Pilih Form</label>
                    <div class="mb-4">
                        <select class="form-select" required aria-label="select example" name="step">
                            <option value="">Pilih...</option>
                            <option value="all">Data Pelamar Keseluruhan</option>
                            <option value="1">Data Pelamar Tahap 1</option>
                            <option value="2">Data Pelamar Tahap 2</option>
                            <option value="3">Data Pelamar Tahap 3</option>
                            <option value="4">Data Pelamar Tahap 4</option>
                        </select>
                        <div class="invalid-feedback">Pilih salah satu jawaban.</div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">CETAK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection