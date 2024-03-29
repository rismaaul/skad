@extends('layout_bendahara.app')

@section('content')
    <div class="container mt-4" style="color: #A0A0F3;">
        <h2>Edit pemasukan</h2>

        <form action="{{ route('bendahara.pemasukan.update', $pemasukan->kode_pemasukan) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_pemasukan" class="form-label">Kode pemasukan</label>
                <input type="text" class="form-control" id="kode_pemasukan" name="kode_pemasukan"
                    value="{{ $pemasukan->kode_pemasukan }}" required>
            </div>
            <div class="mb-3">
                <label for="jenis_pemasukan" class="form-label">Jenis pemasukan</label>
                <select class="form-select" id="jenis_pemasukan" name="jenis_pemasukan">
                    <option value="Amal Harian" @if ($pemasukan->jenis_pemasukan == 'Amal Harian') selected @endif>Amal Harian</option>
                    <option value="Sumbangan" @if ($pemasukan->jenis_pemasukan == 'Sumbangan') selected @endif>Sumbangan</option>
                    <option value="Infaq" @if ($pemasukan->jenis_pemasukan == 'Infaq') selected @endif>Infaq</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_pemasukan" class="form-label">Tanggal pemasukan</label>
                <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan"
                    value="{{ $pemasukan->tanggal_pemasukan->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_pemasukan" class="form-label">Jumlah pemasukan</label>
                <input type="text" class="form-control" id="jumlah_pemasukan" name="jumlah_pemasukan"
                    value="{{ $pemasukan->jumlah_pemasukan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('bendahara.pemasukan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
