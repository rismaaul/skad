
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Data pengeluaran Kas</h2>
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary mb-3">Tambah pengeluaran</a>

 <form action="{{ route('pengeluaran.index') }}" method="GET" class="mb-3">
 <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari pengguna..." name="search">
            <button type="submit" class="btn btn-outline-secondary">Cari</button>
        </div>
    </form>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode pengeluaran</th>
                        <th>Jenis pengeluaran</th>
                        <th>Tanggal pengeluaran</th>
                        <th>Jumlah pengeluaran</th>
                        <th>Dokumentasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluaran as $pengeluaran)
                        <tr>
                            <td>{{ $pengeluaran->kode_pengeluaran }}</td>
                            <td>{{ $pengeluaran->jenis_pengeluaran }}</td>
                            <td>{{ $pengeluaran->tanggal_pengeluaran->format('Y-m-d') }}</td>
                            <td>Rp. {{ number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.') }}</td>
                            <!-- biar rp sama titiknya ada -->
                            <td>
                                {{-- <img src="{{ asset('storage/' . $pengeluaran->dokumentasi) }}" alt="{{ $pengeluaran->kode_pengeluaran }}" class="img-fluid" style="max-width: 300px;">
                                @if ($pengeluaran->dokumentasi)
                                    @foreach (explode(',', $pengeluaran->dokumentasi) as $image)
                                        <!-- <img src="{{ asset('storage/' . $image) }}" alt="{{ $pengeluaran->kode_pengeluaran }}" class="img-fluid" style="max-width: 300px;"> -->
                                    @endforeach
                                @else
                                    Tidak ada dokumentasi
                                @endif --}}
                                <img src="{{ url('dokumentasi') . '/' . $pengeluaran->dokumentasi }} "
                                    style="width: 200px; height: 250px;" alt="dokumentasi" />
                            </td>
                            <td>
                                <a href="{{ route('pengeluaran.show', $pengeluaran->kode_pengeluaran) }}"
                                    class="btn btn-info">Detail</a>
                                <a href="{{ route('pengeluaran.edit', $pengeluaran->kode_pengeluaran) }}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('pengeluaran.destroy', $pengeluaran->kode_pengeluaran) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endsection        