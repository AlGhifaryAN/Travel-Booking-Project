@extends('layouts.admin')

@section('title', 'Tambah Travel Schedule')

@section('content')
<div class="container">
    <h2>Tambah Travel Schedule</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.travel-schedules.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Tujuan</label>
            <input type="text" name="destination" class="form-control" value="{{ old('destination') }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Keberangkatan</label>
            <input type="date" name="departure_date" class="form-control" value="{{ old('departure_date') }}" required>
        </div>

        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="departure_time" class="form-control" value="{{ old('departure_time') }}" required>
        </div>

        <div class="mb-3">
            <label>Quota</label>
            <input type="number" name="quota" class="form-control" value="{{ old('quota') }}" min="1" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" min="0" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.travel-schedules.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
