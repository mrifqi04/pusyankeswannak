@extends('backend.master')

@section('content')
<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>NILAI TES WAWANCARA</h4>
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
                                <td>{{ $key+1 }}</td>
                                <td>{{ $dl->user->name }}</td>
                                <td>{{ $dl->job->nama_pekerjaan }}</td>
                                <td>{{ $dl->status }}</td>
                                <td align="center">
                                    @php
                                        if ($dl->nilai) {                                            
                                            $nilai = $dl->nilai->wawancara;
                                        } else {
                                            $nilai = '';
                                        }
                                    @endphp
                                    <input type="text" value="{{ $nilai ? $nilai : '0' }}" name="name" id="name" class="form-control" onkeydown="input(this)">
                                    <script>
                                        function input(ele) {
                                            if(event.key === 'Enter') {
                                                var data = ele.value
                                                var id = '{{ $dl->id }}'
                                                $.ajax({
                                                    type: "post",
                                                    url: '{{ route('store-tes-wawancara') }}',
                                                    data: {
                                                        data,
                                                        id
                                                    },
                                                    dataType: 'json',
                                                    success: function() {
                                                        Swal.fire(
                                                            'Updated',
                                                            'Nilai berhasil ditambahkan',
                                                            'success'
                                                            )
                                                    },
                                                });      
                                            }
                                        }
                                    </script>

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