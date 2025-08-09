@extends('backend.layouts.app')

@section('title', 'Item List')

@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Item List</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-bars-2"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="avascirpt:void(0)">Items Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="javascirpt:void(0)">List</a>
                    </li>
                </ul>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                @foreach ($items as $item)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="p-2">
                                <img class="card-img-top rounded" src="{{ $item->image }}" alt="{{ $item->name }}" style="height: 150px; aspect-ration: 1/1; object-fit: cover;">
                            </div>
                            <div class="card-body pt-2">
                                <h4 class="mb-1 fw-bold">{{ $item->name }}</h4>
                                <p class="text-muted small mb-2">
                                    <i class="fas fa-coins text-warning"></i>
                                    {{ $item->price }} Points
                                </p>
                                <a href="{{ route('point-shop.show', $item) }}" class="btn btn-outline-primary btn-block">
                                    <i class="fas fa-gift"></i> Exchange
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 <x-footer/>
</div>

<!-- modal -->
<x-modal type="danger" title="Delete Category" action="{{ route('report.destroy', 'delete') }}" button="Delete">
    Are you sure Delete this data?
</x-modal>
@endsection

@push('script')
<script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
$(document).ready(function() {
	$('#basic-datatables').DataTable({
	});

    $('#modal').on('show.bs.modal', function (e){
        let button = $(e.relatedTarget)
        let id = button.data('id')
        $('#form-delete').attr('action', 'report/'+id);
    });
});
</script>
@endpush
