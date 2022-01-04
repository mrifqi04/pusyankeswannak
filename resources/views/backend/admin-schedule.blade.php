@extends('backend.master')

@section('content')
<main class="col ps-md-center pt-2">
    <div class="container">
        <div class="page-header pt-2">
            <h4>UPDATE JADWAL</h4>
        </div>
        <hr />
        <div class="row">
            @foreach ($timelines as $key => $timeline)
            <form class="row mb-3" id="schedule-form" method="post" action="{{ route('set-schedule', $timeline->id) }}">
                @csrf
                <div class="col-md-4">
                    <label for="">{{ $timeline->timeline_name }}</label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" id="tanggal-seleksi" name="timeline_start" value="{{ $timeline->timeline_start }}"
                        required />
                </div>
                <div class="col-1">
                    <label for="">s/d</label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" id="tanggal-seleksi" name="timeline_end" value="{{ $timeline->timeline_end }}"
                        required />
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary mb-3" id="set-schedule" data-id="{{ $timeline->id }}">Simpan</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</main>
@endsection