@extends('front.master')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5 border p-4 bg-light">
            <p class="fw-bold fs-5 text-center">Timeline Penerimaan</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tahapan</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timelines as $key => $timeline)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $timeline->timeline_name }}</td>
                            <td class="text-center">
                                @if ($timeline->timeline_start && $timeline->timeline_end)
                                    <span>{{ date('d M Y', strtotime($timeline->timeline_start)) }} <span class="text-muted"><b>/</b></span> {{ date('d M Y', strtotime($timeline->timeline_end)) }}</span>
                                @else
                                    <span>Tidak ada Jadwal</span>
                                @endif
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection