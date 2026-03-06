@extends('layouts.user.master')

@section('content')
    <article>
        <h1 class="mt-4">{{ $news->title }}</h1>
        <p class="lead">
            Dipublikasikan pada {{ $news->created_at->format('d M Y') }}
        </p>
        @if($news->image)
            <img src="{{ asset('storage/'.$news->image) }}" class="img-fluid rounded mb-4" alt="{{ $news->title }}">
        @endif
        <div class="content">
            {!! nl2br(e($news->content)) !!}
        </div>
        <div class="mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary">← Kembali ke Beranda</a>
        </div>
    </article>
@endsection
