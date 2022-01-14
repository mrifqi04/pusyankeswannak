@extends('backend.master')

@section('content')



<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>DATA PELAMAR</h4>
        </div>
        <hr />
        <div class="row">
            <div class="col-12">
                <div class="container" ;>
                    <table class="table table-striped table-bordered" id="sortTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA</th>
                                <th>BAGIAN</th>
                                <th>STATUS</th>
                                <th width="100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lamaran as $key => $dl)
                            <tr>
                                <td>Peserta-{{ $dl->id }}</td>
                                <td>{{ $dl->user->name }}</td>
                                <td>{{ $dl->job->nama_pekerjaan }}</td>
                                <td>{{ $dl->status }}</td>
                                <td align="center">                                    
                                    <a href="{{ route('detail-pelamar', $dl->id) }}" class="btn btn-success">Detail</a>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script>
                    $("#sortTable").DataTable();
                </script>
            </div>
        </div>
    </div>
</main>

@endsection