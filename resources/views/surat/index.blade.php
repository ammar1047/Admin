@extends('layouts.app') <!-- Jika kamu menggunakan layout utama -->
@section('content')
<div class="main-content">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Surat</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahSurat">
      <i class="bi bi-plus-circle me-1"></i> Tambah Surat
    </button>
  </div>

  <!-- Tabel Daftar Surat -->
  <div class="card-box">
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>No Surat</th>
          <th>Nama Pemohon</th>
          <th>Jenis Surat</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($surats as $index => $surat)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $surat->no_surat }}</td>
          <td>{{ $surat->nama_pemohon }}</td>
          <td>{{ $surat->jenis_surat }}</td>
          <td>{{ $surat->created_at->format('d-m-Y') }}</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditSurat{{ $surat->id }}">
              <i class="bi bi-pencil"></i>
            </button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusSurat{{ $surat->id }}">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>

        <!-- Modal Edit Surat -->
        <div class="modal fade" id="modalEditSurat{{ $surat->id }}" tabindex="-1">
          <div class="modal-dialog">
            <form method="POST" action="{{ route('surat.update', $surat->id) }}">
              @csrf @method('PUT')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Surat</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-2">
                    <label>No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="{{ $surat->no_surat }}" required>
                  </div>
                  <div class="mb-2">
                    <label>Nama Pemohon</label>
                    <input type="text" name="nama_pemohon" class="form-control" value="{{ $surat->nama_pemohon }}" required>
                  </div>
                  <div class="mb-2">
                    <label>Jenis Surat</label>
                    <input type="text" name="jenis_surat" class="form-control" value="{{ $surat->jenis_surat }}" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Modal Hapus Surat -->
        <div class="modal fade" id="modalHapusSurat{{ $surat->id }}" tabindex="-1">
          <div class="modal-dialog">
            <form method="POST" action="{{ route('surat.destroy', $surat->id) }}">
              @csrf @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Hapus Surat</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  Apakah Anda yakin ingin menghapus surat <strong>{{ $surat->no_surat }}</strong>?
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger">Hapus</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah Surat -->
<div class="modal fade" id="modalTambahSurat" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('surat.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Surat Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label>No Surat</label>
            <input type="text" name="no_surat" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>Nama Pemohon</label>
            <input type="text" name="nama_pemohon" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>Jenis Surat</label>
            <input type="text" name="jenis_surat" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
