{{-- resources/views/admin/edit.blade.php --}}
@extends('Layouts.admin.master')

@section('title', 'Edit Berita')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Berita: {{ $news->title }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $news->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="excerpt" class="form-label">Ringkasan (opsional)</label>
                <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="3">{{ old('excerpt', $news->excerpt) }}</textarea>
                @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                @if($news->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" width="200" class="img-thumbnail">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
