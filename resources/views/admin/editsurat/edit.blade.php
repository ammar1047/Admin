@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Template Surat</h2>

    <form>
        <div class="mb-3">
            <label>Judul Template</label>
            <input type="text" name="judul_template" class="form-control" value="{{ $template->judul_template }}">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach ($kategoriList as $kategori)
                    <option value="{{ $kategori->id }}" {{ $template->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Format File</label>
            <select name="format_file" class="form-control">
                <option value="pdf" {{ $template->format_file == 'pdf' ? 'selected' : '' }}>PDF</option>
                <option value="docx" {{ $template->format_file == 'docx' ? 'selected' : '' }}>DOCX</option>
            </select>
        </div>

        <div class="mb-3">
            <label>File Template</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
