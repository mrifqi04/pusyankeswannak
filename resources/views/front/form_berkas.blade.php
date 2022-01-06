@extends('front.master')

@section('content')
<div class="container">
    <div class="py-5 text-left">
        <h3>Form Unggah Berkas</h3>
    </div>
</div>

<div class="container">
    <form class="row g-3 needs-validated">
        <div class="col-md-12 mb-4">

            <div class="mb-3">
                <label for="formKTP" class="form-label">Unggah Kartu Tanda Penduduk</label>
                <input class="form-control" type="file" id="formKTP" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="formKK" class="form-label">Unggah Kartu Keluarga</label>
                <input class="form-control" type="file" id="formKK" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="form-pas-photo" class="form-label">Unggah Pas Photo 4 x 6</label>
                <input class="form-control" type="file" id="form-pas-photo" accept="image/jpg" required>
                <p class="fs-6">Format File JPG</p>
            </div>

            <div class="mb-3">
                <label for="form-ijazah-transkrip" class="form-label">Unggah Ijazah dan Transkrip Nilai</label>
                <input class="form-control" type="file" id="form-ijazah-transkrip" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="formNPWP" class="form-label">Unggah NPWP</label>
                <input class="form-control" type="file" id="formNPWP" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="formSKCK" class="form-label">Unggah Surat Keterangan Catatan Kepolisian</label>
                <input class="form-control" type="file" id="formSKCK" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="form-surat-kesehatan" class="form-label">Unggah Surat Kesehatan</label>
                <input class="form-control" type="file" id="form-surat-kesehatan" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="form-sertifikat" class="form-label">Unggah Sertifikat</label>
                <input class="form-control" type="file" id="form-sertifikat" accept="application/pdf">
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="form-SIM" class="form-label">Unggah Surat Izin Mengemudi (Khusus Tenaga Supir)</label>
                <input class="form-control" type="file" id="formSIM" accept="application/pdf">
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="form-surat-lamaran" class="form-label">Unggah Surat Lamaran</label>
                <input class="form-control" type="file" id="form-surat-lamaran" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

            <div class="mb-3">
                <label for="form-riwayat-hidup" class="form-label">Unggah Daftar Riwayat Hidup (CV)</label>
                <input class="form-control" type="file" id="form-riwayat-hidup" accept="application/pdf" required>
                <p class="fs-6">Format File PDF</p>
            </div>

        </div>
</div>

<div class="container mb-5">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ URL::previous() }}">
            <button class="btn btn-primary me-md-2" type="button">❮ Sebelumnya</button>
        </a>
        <a href="profile.php">
            <button class="btn btn-primary" type="submit">Kirim</button>
        </a>
    </div>
</div>
</form>
</div>
@endsection