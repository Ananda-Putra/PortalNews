{{-- resources/views/admin/show.blade.php --}}
@extends('Layouts.admin.master')

@section('title', 'Detail Berita')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Berita</h3>
        <div class="card-tools">
            <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                @if($news->image)
                    <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="img-fluid img-thumbnail">
                @else
                    <div class="bg-light text-center p-5">Tidak ada gambar</div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="150">ID</th>
                        <td>{{ $news->id }}</td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $news->title }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $news->slug }}</td>
                    </tr>
                    <tr>
                        <th>Ringkasan</th>
                        <td>{{ $news->excerpt ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>{{ $news->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diupdate</th>
                        <td>{{ $news->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <h5>Konten:</h5>
            <div class="p-3 bg-light rounded">
                {!! nl2br(e($news->content)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
