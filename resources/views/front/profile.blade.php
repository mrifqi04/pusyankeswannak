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
                type="button" role="tab" aria-controls="profile" aria-selected="false">Unggah Berkas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="detail-status-tab" data-bs-toggle="tab" data-bs-target="#detail-status"
                type="button" role="tab" aria-controls="contact" aria-selected="false">Detail Status</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="data-pribadi-tab">
            <div class="row p-4 col-md-10 offset-md-1">
                <form action="{{ route('update-profile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="profile-pic text-end">            
                        <input id="image" type="file" name="profile_picture" onchange="loadFile(event)" />
                        @if (Auth::user()->profile_picture)
                        <img src="{{ URL::asset('profile_picture/'. Auth::user()->profile_picture) }}" id="output" width="200">

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
                        <input type="text" id="nik" class="form-control" placeholder="" readonly value="">
                    </div>

                    <div class="form-group mb-4">
                        <label for="input-nik" class="form-label">NIK</label>
                        <input type="text" id="nik" class="form-control" placeholder="" readonly
                            value="{{ Auth::user()->nik }}">
                    </div>

                    <div class="form-group mb-4">
                        <label for="bidang-lowongan" class="form-label">POSISI</label>
                        <input type="text" id="posisi" class="form-control" placeholder="" readonly value="">
                    </div>

                    <div class="form-group mb-4">
                        <label for="input-nama">NAMA (Sesuai KTP)</label>
                        <input type="text" class="form-control" name="name" id="nama"
                            value="{{ Auth::user()->name }}">
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

                    <div class="form-group mb-4">
                        <label for="input-alamat">ALAMAT</label>
                        <textarea type="text" class="form-control" name="address" id="alamat" placeholder=""
                            style="height: 100px">{{ Auth::user()->address }}</textarea>
                    </div>

                    <div class="container">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- <div class="tab-pane fade" id="unggah-berkas" role="tabpanel" aria-labelledby="unggah-berkas-tab">
            <div class="row p-4">


            </div>
        </div> --}}

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
                        <tr>
                            <td>1</td>
                            <td>Seleksi Berkas</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tes Tertulis</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Wawancara</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ujian Praktek</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Negoisasi</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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