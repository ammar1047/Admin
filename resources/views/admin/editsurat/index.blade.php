@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Template Surat</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Format</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($templates as $template)
                <tr>
                    <td>{{ $template->judul_template }}</td>
                    <td>{{ $template->kategori->nama_kategori }}</td>
                    <td>{{ strtoupper($template->format_file) }}</td>
                    <td>
                        <a href="{{ route('edit-surat.edit', $template->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
