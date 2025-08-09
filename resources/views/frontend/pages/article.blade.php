@extends('frontend.layouts.app')

@section('title')
    Article
@endsection

@section('content')
    @if ($articles->isEmpty())
        <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">
            <div class="alert alert-warning text-center p-5">
            <i class="bi bi-exclamation-triangle-fill fs-1 mb-3"></i>
            <h4>No articles found.</h4>
            <p class="mb-0">Try adjusting your search or check back later.</p>
            <form method="GET" class="mt-3">
                <div class="input-group">
                    <input type="search" name="search" class="form-control form-control-lg"
                        placeholder="Search articles..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary btn-lg">Search</button>
                </div> 
            </form>
            </div>
        </div>
    @else
    <div class="container pb-5">
        <div class="my-3">
            <form method="GET" class="row mb-4">
                <div class="col-md-11 mb-2 mb-md-0">
                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Search articles..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary btn-lg">Search</button>
                </div>
            </form>
        </div>

        <x-sections.artikel :articles="$articles"></x-sections.artikel>
    </div>
    @endif

@endsection
