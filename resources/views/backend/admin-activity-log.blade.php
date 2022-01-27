@extends('backend.master')

@section('content')
<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>LOG ACTIVITY</h4>
        </div>
        <hr />
        <div class="row">
            <div class="col-12">
                <div class="container" ;>
                    <table class="table table-striped table-bordered" id="sortTable">
                        <thead>
                            <tr>
                                <th>TIMESTAMP</th>
                                <th>NAMA</th>                                
                                <th>AKTIVITAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                            <tr>
                                <td>{{ date('d M Y : h:i a', strtotime($log->created_at)) }}</td>                                
                                <td>{{ $log->name }}</td>
                                <td>{{ $log->aktifitas }}</td>                                
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