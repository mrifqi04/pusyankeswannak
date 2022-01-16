@extends('front.master') @section('css')
<style>
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }
</style>

@endsection @section('content')
<div class="container">
    <div class="py-5 text-left">
        <h3>Form Pendaftaran</h3>
    </div>
</div>

<div class="container">
    <form id="regForm" action="{{ route('store-pendaftaran') }}" class="container row g-3 needs-validated" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="tab">
            <div class="form-group mb-4 col-md-4">
                <label for="input-posisi" class="form-label">POSISI</label>
                <input type="text" id="bagian" class="form-control" placeholder="" readonly
                    value="{{ $job->nama_pekerjaan }}" />
                <input type="hidden" name="posisi" value="{{ $job->id }}">
            </div>

            <div class="form-group mb-4">
                <label for="input-nik" class="form-label">NIK</label>
                <input type="text" id="nik" class="form-control" placeholder="" readonly
                    value="{{ Auth::user()->nik }}" />
            </div>

            <div class="form-group mb-4">
                <label for="input-no-kk">NO. KK</label>
                <input name="no_kk" type="text" class="form-control" id="no-kk" placeholder="" />
            </div>

            <div class="form-group mb-4">
                <label for="input-nama">NAMA (Sesuai KTP)</label>
                <input type="text" class="form-control" id="nama" placeholder="" readonly
                    value="{{ Auth::user()->name }}" />
            </div>

            <div class="form-group row mb-2">
                <label for="input-alamat">ALAMAT</label>
                <div class="col-md-8">
                    <input name="jalan" type="text" class="form-control" placeholder="Jalan" aria-label="" />
                </div>
                <div class="col-md-2">
                    <input name="rt" type="text" class="form-control" placeholder="RT" aria-label="" />
                </div>
                <div class="col-md-2">
                    <input name="rw" type="text" class="form-control" placeholder="RW" aria-label="" />
                </div>
            </div>

            <div class="form-group row mb-2">
                <div class="col-md-6">
                    <input name="kelurahan" type="text" class="form-control" placeholder="Kelurahan" aria-label="" />
                </div>
                <div class="col-md-6">
                    <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" aria-label="" />
                </div>
            </div>

            <div class="form-group row mb-4">
                <div class="col-md-6">
                    <input name="kota" type="text" class="form-control" placeholder="Kota" aria-label="" />
                </div>
                <div class="col-md-6">
                    <input name="provinsi" type="text" class="form-control" placeholder="Provinsi" aria-label="" />
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="input-no-hp">JENIS KELAMIN</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="jenis_kelamin1"
                        value="L" name="jenis_kelamin" />
                    <label class="form-check-label" for="jenis_kelamin1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="jenis_kelamin2"
                        value="P" name="jenis_kelamin" />
                    <label class="form-check-label" for="jenis_kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group mb-4 col-md-4">
                <label for="input-tanggal-lahir">TANGGAL LAHIR</label>
                <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir"/>
                {{-- <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir" value="{{ date('Y-m-d', strtotime(Auth::user()->tanggal_lahir)) }}" /> --}}
            </div>

            <div class="form-group mb-4">
                <label for="input-no-hp">NO. HP</label>
                <input name="no_hp" type="text" class="form-control" id="no-hp" placeholder="" />
                {{-- <input name="no_hp" type="text" class="form-control" id="no-hp" placeholder="" value="{{ Auth::user()->no_hp }}" readonly /> --}}
            </div>

            <label for="input-pendidikan" class="form-label">PENDIDIKAN TERAKHIR</label>
            <div class="mb-4">
                <select name="pendidikan" class="form-select" aria-label="select example">
                    <option value="">Pilih...</option>
                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                    <option value="SMA/SMK/Sederajat">SMA/SMK/Sederajat</option>
                    <option value="Diploma 1 (D1)">Diploma 1 (D1)</option>
                    <option value="Diploma 2 (D2)">Diploma 2 (D2)</option>
                    <option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
                    <option value="Diploma 4 (D4)">Diploma 4 (D4)</option>
                    <option value="Sarjana (S1)">Sarjana (S1)</option>
                    <option value="Magister (S2)">Magister (S2)</option>
                </select>
                <div class="invalid-feedback">Pilih salah satu jawaban.</div>
            </div>

            <div class="form-group mb-4">
                <label for="input-npwp">NPWP</label>
                <input name="npwp" type="text" class="form-control" id="npwp" placeholder="" />
            </div>

            <div class="form-group mb-4 col-md-4">
                <label for="input-tanggal-skck">TANGGAL SKCK</label>
                <input type="date" class="form-control" id="tanggal-skck" name="tanggal_skck" value="" />
            </div>

            <div class="form-group row mb-4">
                <label for="input-alamat">REKENING (optional)</label>
                <div class="col-md-2">
                    <input name="bank" type="text" class="form-control" placeholder="Nama Bank" aria-label="" />
                </div>

                <div class="col-md-4">
                    <input name="rekening" type="text" class="form-control" placeholder="Nomor Rekening" aria-label="" />
                </div>
            </div>

            <label for="input-instansi-surkes" class="form-label">INSTANSI SURAT KESEHATAN</label>
            <div class="mb-4">
                <select name="surat_sehat" class="form-select" aria-label="select example">
                    <option value="">Pilih...</option>
                    <option value="Puskesmas">Puskesmas</option>
                    <option value="Rumah Sakit Pemerintah">Rumah Sakit Pemerintah</option>
                </select>
            </div>
        </div>

        <div class="tab">
            <div class="col-md-12 mb-4">

                <div class="mb-3">
                    <label for="formKTP" class="form-label">Unggah Kartu Tanda Penduduk</label>
                    <input name="file_ktp" class="form-control" type="file" id="formKTP" accept="application/pdf" required>
                    <p class="fs-6">Format File PDF</p>
                </div>

                <div class="mb-3">
                    <label for="formKK" class="form-label">Unggah Kartu Keluarga</label>
                    <input name="file_kk" class="form-control" type="file" id="formKK" accept="application/pdf" required>
                    <p class="fs-6">Format File PDF</p>
                </div>

                <div class="mb-3">
                    <label for="form-pas-photo" class="form-label">Unggah Pas Photo 4 x 6</label>
                    <input name="file_foto" class="form-control" type="file" id="form-pas-photo" accept="image/jpg" required>
                    <p class="fs-6">Format File JPG</p>
                </div>

                <div class="mb-3">
                    <label for="form-ijazah-transkrip" class="form-label">Unggah Ijazah dan Transkrip Nilai</label>
                    <input name="file_nilai_ijazah" class="form-control" type="file" id="form-ijazah-transkrip" accept="application/pdf"
                        required>
                    <p class="fs-6">Format File PDF</p>
                </div>

                <div class="mb-3">
                    <label for="formNPWP" class="form-label">Unggah NPWP</label>
                    <input name="file_npwp" class="form-control" type="file" id="formNPWP" accept="application/pdf" required>
                    <p class="fs-6">Format File PDF</p>
                </div>

                <div class="mb-3">
                    <label for="formSKCK" class="form-label">Unggah Surat Keterangan Catatan Kepolisian</label>
                    <input name="file_skck" class="form-control" type="file" id="formSKCK" accept="application/pdf" required>
                    <p class="fs-6">Format File PDF</p>
                </div>

                <div class="mb-3">
                    <label for="form-surat-kesehatan" class="form-label">Unggah Surat Kesehatan</label>
                    <input name="file_surat_sehat" class="form-control" type="file" id="form-surat-kesehatan" accept="application/pdf" required>
                    <p class="fs-6">Format File PDF</p>
                </div>

                <div class="mb-3">
                    <label for="form-sertifikat" class="form-label">Unggah Sertifikat</label>
                    <input name="file_sertifikat" class="form-control" type="file" id="form-sertifikat" accept="application/pdf">
                    <p class="fs-6">Format File PDF</p>
                </div>

                @if ($job->id == 9)
                    <div class="mb-3">
                        <label for="form-SIM" class="form-label">Unggah Surat Izin Mengemudi (Khusus Tenaga Supir)</label>
                        <input name="file_sim" class="form-control" type="file" id="formSIM" accept="application/pdf">
                        <p class="fs-6">Format File PDF</p>
                    </div>                    
                @endif

                <div class="mb-3">
                    <label for="form-surat-lamaran" class="form-label">Unggah Surat Lamaran</label>
                    <input name="file_lamaran" class="form-control" type="file" id="form-surat-lamaran" accept="application/pdf" required>
                    <p class="fs-6">Format File PDF</p>
                </div>

                <div class="mb-3">
                    <label for="form-riwayat-hidup" class="form-label">Unggah Daftar Riwayat Hidup (CV)</label>
                    <input name="file_cv" class="form-control" type="file" id="form-riwayat-hidup" accept="application/pdf" required>
                    <p class="fs-6">Format File PDF</p>
                </div>

            </div>
        </div>

        <div class="mb-5">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
</div>
@endsection @section('script')
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == x.length - 1) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n);
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x,
            y,
            i,
            valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className +=
                " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i,
            x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>
@endsection