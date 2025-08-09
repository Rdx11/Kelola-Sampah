@extends('frontend.layouts.app')

@section('title')
    Lapor Sampah
@endsection

@section('content')
    <div class="container py-5">
        <div class="row d-flex align-item-center">
            <div class="col-md-5">
                <div class="text-center">
                    <img src="{{ asset('frontend/img/report.svg') }}" alt="Report Illustration" class="img-fluid"
                        style="height: 500px;">
                    <p class="lead">Bantu jaga lingkungan kita tetap bersih dengan mengirimkan laporan!</p>
                </div>
            </div>

            <div class="col-md-7 pt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Buat Laporan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user-reports.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="title">Report Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" required
                                    value="{{ old('title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="photo">Photo <span class="text-danger">*</span></label>
                                <input type="file" name="photo" id="photo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="location">Location <span class="text-danger">*</span></label>
                                <input type="text" name="location" id="location" class="form-control" required
                                    value="{{ old('location') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit
                                    Report
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
