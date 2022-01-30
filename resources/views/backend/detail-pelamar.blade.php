@extends('backend.master')

@section('css')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    @import url(http://fonts.googleapis.com/css?family=Lato:400,700);

    body {
        font-family: 'Lato', 'sans-serif';
    }

    .profile {
        min-height: 355px;
        display: inline-block;
    }

    figcaption.ratings {
        margin-top: 20px;
    }

    figcaption.ratings a {
        color: #f1c40f;
        font-size: 11px;
    }

    figcaption.ratings a:hover {
        color: #f39c12;
        text-decoration: none;
    }

    .divider {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .emphasis {
        border-top: 4px solid transparent;
    }

    .emphasis:hover {
        border-top: 4px solid #1abc9c;
    }

    .emphasis h2 {
        margin-bottom: 0;
    }

    span.tags {
        background: #1abc9c;
        border-radius: 2px;
        color: #f5f5f5;
        font-weight: bold;
        padding: 2px 4px;
    }

    .dropdown-menu {
        background-color: #34495e;
        box-shadow: none;
        -webkit-box-shadow: none;
        width: 250px;
        margin-left: -125px;
        left: 50%;
    }

    .dropdown-menu .divider {
        background: none;
    }

    .dropdown-menu>li>a {
        color: #f5f5f5;
    }

    .dropup .dropdown-menu {
        margin-bottom: 10px;
    }

    .dropup .dropdown-menu:before {
        content: "";
        border-top: 10px solid #34495e;
        border-right: 10px solid transparent;
        border-left: 10px solid transparent;
        position: absolute;
        bottom: -10px;
        left: 50%;
        margin-left: -10px;
        z-index: 10;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="well profile col-md-12">
            <div class="col-sm-12">
                <div class="col-sm-8">
                    <h2>{{ $lamaran->user->name }} ({{ $lamaran->user->nik }})</h2>
                    <h4>No KK : {{ $lamaran->no_kk }}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 mt-5" id="about">
                                <p><strong>About: </strong> <br>
                                <table>
                                    <tr>
                                        <td>Tanggal lahir</td>
                                        <td>:</td>
                                        <td>{{ date('d M Y', strtotime($lamaran->user->tanggal_lahir)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $lamaran->user->jenis_kelamin == 'L' ? "Laki-laki" : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan</td>
                                        <td>:</td>
                                        <td>{{ $lamaran->pendidikan }}</td>
                                    </tr>
                                    <tr>
                                        <td>NPWP</td>
                                        <td>:</td>
                                        <td>{{ $lamaran->npwp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomer HP</td>
                                        <td>:</td>
                                        <td>{{ $lamaran->user->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal aktif SKCK</td>
                                        <td>:</td>
                                        <td>{{ $lamaran->tanggal_skck }}</td>
                                    </tr>
                                    <tr>
                                        <td>Surat Sehat</td>
                                        <td>:</td>
                                        <td>{{ $lamaran->surat_sehat }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="mb-3" id="about">
                                <p><strong>Address: </strong> <br>
                                <table>
                                    <tr>
                                        <td>Nama Jalan</td>
                                        <td>:</td>
                                        <td>{{ $lamaran->address->jalan }}</td>
                                    </tr>
                                    <tr>
                                        <td>RT : {{ $lamaran->address->rt }}, RW : {{ $lamaran->address->rw }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan {{ $lamaran->address->kelurahan }}, Kecamatan {{
                                            $lamaran->address->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kota {{ $lamaran->address->kota }}, Provinsi {{ $lamaran->address->provinsi
                                            }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2><strong> {{ $lamaran->job->nama_pekerjaan }} </strong></h2>
            @if ($lamaran->status == 'Proses')
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <form action="{{ route('accept-pelamar', $lamaran->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success btn-block mt-3" onclick="onConfirm()">Accept
                        </button>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <button type="submit" class="btn btn-danger btn-block mt-3" onclick="onReject()">Reject</button>
                </div>
            </div>
            @endif
        </div>

        <div class="col-md-12">
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_ktp) }}">File KTP</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_kk) }}">File KK</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_foto) }}">File Foto</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_nilai_ijazah) }}">File Nilai Ijazah</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_npwp) }}">File NPWP</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_skck) }}">File SKCK</a>
            @if ($lamaran->file->file_sim)
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_sim) }}">File SIM</a>
            @endif
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_surat_sehat) }}">File Surat Sehat</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_sertifikat) }}">File Sertifikat</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_lamaran) }}">File Lamaran</a>
            <a class="btn btn-primary" target="_blank"
                href="{{ URL::asset('file_pelamar/' . $lamaran->file->file_cv) }}">File CV</a>
        </div>
    </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    function onConfirm() {
        if(confirm('Apa anda yakin ingin menerima peserta ini?')){         
         return
        }else{         
         event.preventDefault()            
        }
    }
    function onReject() {
        if(confirm('Apa anda yakin ingin menolak peserta ini?')){                     
            
            let text = prompt("Masukan alasan:");
            if (text == null || text == "") {
                return false
            } else {         
                $.ajax({
                    type: "post",
                    url: '{{ route('reject-pelamar', $lamaran->id) }}',
                    data: {
                        text                        
                    },
                    dataType: 'json',
                    success: function() {
                        Swal.fire(
                            'Rejected',
                            'Pelamar berhasil di tolak',
                            'error'
                            ).then(function() {
                                location.reload()
                            })
                    },
                })               
            }
        }else{         
         event.preventDefault()            
        }
    }
</script>
@endsection