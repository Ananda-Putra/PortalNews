@extends('layouts.user.master')

@section('content')
    @if($news->count() > 0)
        @php $first = $news->shift(); @endphp
        <!-- Featured blog post -->
        <div class="card mb-4">
            @if($first->image)
                <a href="{{ route('news.show', $first->slug) }}">
                    <img class="card-img-top" src="{{ asset('storage/'.$first->image) }}" alt="{{ $first->title }}">
                </a>
            @else
                <a href="{{ route('news.show', $first->slug) }}">
                    <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="...">
                </a>
            @endif
            <div class="card-body">
                <div class="small text-muted">{{ $first->created_at->format('F d, Y') }}</div>
                <h2 class="card-title">{{ $first->title }}</h2>
                <p class="card-text">{{ $first->excerpt ?? Str::limit($first->content, 150) }}</p>
                <a class="btn btn-primary" href="{{ route('news.show', $first->slug) }}">Read more →</a>
            </div>
        </div>

        <!-- Nested row for remaining posts -->
        <div class="row">
            @foreach($news->chunk(2) as $chunk)
                @foreach($chunk as $item)
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            @if($item->image)
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <img class="card-img-top" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
                                </a>
                            @else
                                <a href="{{ route('news.show', $item->slug) }}">
                                    <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="...">
                                </a>
                            @endif
                            <div class="card-body">
                                <div class="small text-muted">{{ $item->created_at->format('F d, Y') }}</div>
                                <h2 class="card-title h4">{{ $item->title }}</h2>
                                <p class="card-text">{{ $item->excerpt ?? Str::limit($item->content, 100) }}</p>
                                <a class="btn btn-primary" href="{{ route('news.show', $item->slug) }}">Read more →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

        <!-- Pagination -->
        <nav aria-label="Pagination">
            <hr class="my-0" />
            {{ $news->links() }}
        </nav>
    @else
        <p>Tidak ada berita.</p>
    @endif
@endsection
