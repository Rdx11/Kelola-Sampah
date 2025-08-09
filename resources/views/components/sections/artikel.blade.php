@props(['articles' => []])

<div class="container">
    <div class="mb-2 row">
        <div class="mb-5 text-center">
            <h2 class="fw-bold">Artikel Berita</h2>
        </div>
        @foreach($articles as $article)
        <div class="col-md-6">
            <div class="card mb-4 flex-row flex-wrap border-0 shadow">
                <div class="col-12 col-md-4 p-0">
                    <img src="{{ $article->thumbnail }}" alt="Article Image" class="img-fluid h-100 w-100 object-fit-cover rounded-start" style="min-height: 200px; max-height: 250px; object-fit: cover;">
                </div>
                <div class="col-12 col-md-8 d-flex flex-column justify-content-between p-4">
                    <div>
                        <h5 class="card-title mb-2">{{ $article->title ?? 'Article Title' }}</h5>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-2">{{ Str::limit(strip_tags($article->content), 100, '...') }}</p>
                    </div>
                    <a href="#" class="stretched-link mt-auto">Continue reading</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(method_exists($articles, 'links'))
        <div class="d-flex justify-content-center">
            {{ $articles->links('pagination::bootstrap-4') }}
        </div>
    @else
    <div class="d-flex justify-content-center mb-5">
        <a href="{{ route('list.article') }}" class="btn btn-outline-primary">Lihat Semua</a>
    </div>
    @endif
</div>