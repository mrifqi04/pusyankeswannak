@extends('backend.master')

@section('content')
<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>UPDATE JUMLAH POSISI</h4>
        </div>
        <hr />

        <div class="col-md-8 offset-md-2">
            <form action="{{ route('store-kuota-posisi') }}" method="post" class="p-4">
                @csrf
                <div class="row">                    
                    <div class="mb-3 col-md-12">
                        <label for="input-jenis-nilai" class="form-label">Posisi</label>
                        <select class="form-select" aria-label="select example" required name="job">
                            <option value="">Pilih...</option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->nama_pekerjaan }}</option>                                
                            @endforeach                            
                        </select>
                        <div class="invalid-feedback">Pilih salah satu jawaban.</div>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label>Kuota</label>
                        <input type="text" name="kuota" class="form-control" required>
                    </div>

                    <div class="col-md-12 my-3">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>

        </br>

        <div class="row">
            <table class="table table-striped table-bordered" id="">
                <thead>
                    <tr>
                        <th>POSISI</th>
                        <th>JUMLAH</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->nama_pekerjaan }}</td>
                        <td>{{ $job->kuota }}</td>
                    </tr>
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
</main>
@endsection