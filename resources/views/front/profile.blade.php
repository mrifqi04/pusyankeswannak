@extends('front.master')

@section('content')
<div class="container p-3">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="data-pribadi-tab" data-bs-toggle="tab" data-bs-target="#data-pribadi"
                type="button" role="tab" aria-controls="data-pribadi" aria-selected="true">Data Pribadi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="unggah-berkas-tab" data-bs-toggle="tab" data-bs-target="#unggah-berkas"
                type="button" role="tab" aria-controls="profile" aria-selected="false">File Berkas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="detail-status-tab" data-bs-toggle="tab" data-bs-target="#detail-status"
                type="button" role="tab" aria-controls="contact" aria-selected="false">Detail Status</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="data-pribadi-tab">
            <div class="row p-4 col-md-10 offset-md-1">
                <form action="{{ route('update-profile', Auth::user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="profile-pic text-end">
                        <input id="image" type="file" name="profile_picture" onchange="loadFile(event)" />
                        @if (Auth::user()->profile_picture)
                        <img src="{{ URL::asset('profile_picture/'. Auth::user()->profile_picture) }}" id="output"
                            width="200">

                        @else
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="output" width="200">
                        @endif

                        <script>
                            var loadFile = function (event) {
                            var image = document.getElementById("output");
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        </script>
                    </div>

                    <div class="form-group mb-4 mt-4 col-md-6">
                        <label for="status" class="form-label">STATUS</label>

                        @foreach ($status as $ds)
                        <input type="text" id="nik" class="form-control" placeholder="" readonly
                            value="{{ $ds->step }} - {{ $ds->status }}">
                        @endforeach
                    </div>

                    <div class="form-group mb-4">
                        <label for="input-nik" class="form-label">NIK</label>
                        <input type="text" id="nik" class="form-control" placeholder="" readonly
                            value="{{ Auth::user()->nik }}">
                    </div>

                    @if ($lamaran)
                    <div class="form-group mb-4">
                        <label for="bidang-lowongan" class="form-label">POSISI</label>
                        <input type="text" id="posisi" class="form-control"
                            placeholder="{{ $lamaran->job->nama_pekerjaan }}" readonly value="">
                    </div>
                    @else
                    <div class="form-group mb-4">
                        <label for="bidang-lowongan" class="form-label">POSISI</label>
                        <input type="text" id="posisi" class="form-control" placeholder="Belum mendaftar pekerjaan"
                            readonly value="">
                    </div>
                    @endif

                    <div class="form-group mb-4">
                        <label for="input-nama">NAMA (Sesuai KTP)</label>
                        <input type="text" class="form-control" name="name" id="nama" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="form-group mb-4 col-md-6">
                        <label for="input-tanggal-lahir">TANGGAL LAHIR</label>
                        <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir"
                            value="{{ date('Y-m-d', strtotime(Auth::user()->tanggal_lahir)) }}">
                    </div>

                    <div class="form-group mb-4">
                        <label for="input-jenis-kelamin">JENIS KELAMIN</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                value="L" required {{ Auth::user()->jenis_kelamin == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_kelamin1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                value="P" {{ Auth::user()->jenis_kelamin == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_kelamin2">
                                Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-4 col-md-6">
                        <label for="input-no-hp">NO. HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no-hp"
                            value="{{ Auth::user()->no_hp }}">
                    </div>

                    @if ($lamaran)
                    <div class="form-group mb-4">
                        <label for="input-alamat">ALAMAT</label>
                        <textarea type="text" class="form-control" name="address" id="alamat" placeholder=""
                            style="height: 100px">
                        {{ $lamaran->address->jalan }}, {{ $lamaran->address->rt }} / {{ $lamaran->address->rw }}. 
                        {{ $lamaran->address->kecamatan }}, {{ $lamaran->address->kelurahan }}. 
                        {{ $lamaran->address->kota }}. {{ $lamaran->address->provinsi }}
                        </textarea>
                    </div>
                    @else
                    <div class="form-group mb-4">
                        <label for="input-alamat">ALAMAT</label>
                        <textarea type="text" class="form-control" name="address" id="alamat" placeholder=""
                            style="height: 100px"></textarea>
                    </div>
                    @endif

                    <div class="container">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="unggah-berkas" role="tabpanel" aria-labelledby="unggah-berkas-tab">
            <div class="row p-4">
                <div class="card" style="width: 100rem;">
                    <div class="card-body">
                        @if ($lamaran)
                        @if ($lamaran->file->file_ktp)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_ktp) }}">File KTP</a>
                        @endif
                        @if ($lamaran->file->file_kk)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_kk) }}">File KK</a>
                        @endif
                        @if ($lamaran->file->file_foto)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_foto) }}">File Foto</a>
                        @endif
                        @if ($lamaran->file->file_nilai_ijazah)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_nilai_ijazah) }}">File Nilai
                            Ijazah</a>
                        @endif
                        @if ($lamaran->file->file_npwp)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_npwp) }}">File NPWP</a>
                        @endif
                        @if ($lamaran->file->file_skck)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_skck) }}">File SKCK</a>
                        @endif
                        @if ($lamaran->file->file_sim)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_sim) }}">File SIM</a>
                        @endif
                        @if ($lamaran->file->file_surat_sehat)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_surat_sehat) }}">File Surat
                            Sehat</a>
                        @endif
                        @if ($lamaran->file->file_sertifikat)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_sertifikat) }}">File
                            Sertifikat</a>
                        @endif
                        @if ($lamaran->file->file_lamaran)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_lamaran) }}">File Lamaran</a>
                        @endif
                        @if ($lamaran->file->file_cv)
                        <a class="btn btn-primary" target="_blank"
                            href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_cv) }}">File CV</a>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="detail-status" role="tabpanel" aria-labelledby="detail-status-tab">
            <div class="row p-4">
                <table class="table table-striped table-bordered" id="">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TAHAP</th>
                            <th>TANGGAL MULAI</th>
                            <th>TANGGAL AKHIR</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timelines as $key => $timeline)
                        @if ($timeline->id != 6)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $timeline->timeline_name }}</td>
                            <td>{{ date("d M Y", strtotime($timeline->timeline_start)) }}</td>
                            <td>{{ date("d M Y", strtotime($timeline->timeline_end)) }}</td>
                            <td>
                                @foreach ($status as $ds)
                                @if ($ds->step == 'TAHAP 1' && $key == 0)
                                {{-- <input type="text" id="nik" class="form-control" placeholder="" readonly
                                    value="{{ $ds->step }} - {{ $ds->status }}"> --}}
                                {{ $ds->step }} - {{ $ds->status }} <br>
                                @endif
                                @if ($ds->step == 'TAHAP 2' && $key == 1)
                                {{-- <input type="text" id="nik" class="form-control" placeholder="" readonly
                                    value="{{ $ds->step }} - {{ $ds->status }}"> --}}
                                {{ $ds->step }} - {{ $ds->status }}
                                @endif
                                @if ($ds->step == 'TAHAP 3' && $key == 2)
                                {{-- <input type="text" id="nik" class="form-control" placeholder="" readonly
                                    value="{{ $ds->step }} - {{ $ds->status }}"> --}}
                                {{ $ds->step }} - {{ $ds->status }}
                                @endif
                                @if ($ds->step == 'TAHAP 4' && $key == 3)
                                {{-- <input type="text" id="nik" class="form-control" placeholder="" readonly
                                    value="{{ $ds->step }} - {{ $ds->status }}"> --}}
                                {{ $ds->step }} - {{ $ds->status }}
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <style type="text/css">
                    .table {
                        margin: 0 auto;
                        width: 80%;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
@endsection