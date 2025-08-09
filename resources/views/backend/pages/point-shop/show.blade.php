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
            <div class="row">
                @if(isset($item))
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-5 d-flex align-items-center">
                                    <img
                                        src="{{ $item->image ? $item->image : asset('frontend/img/default-item.png') }}"
                                        class="img-fluid rounded-start w-100"
                                        alt="{{ $item->name }}">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h3 class="card-title fw-bold">{{ $item->name }}</h3>
                                        <p class="card-text text-muted mb-2">
                                            <i class="fas fa-coins text-warning"></i>
                                            {{ number_format($item->price) }} Points
                                        </p>
                                        <p class="card-text mb-2">
                                            <strong>Description:</strong><br>
                                            {{ $item->description ?? '-' }}
                                        </p>
                                        <p class="card-text mb-2">
                                            <strong>Stock:</strong> {{ $item->stock }}
                                        </p>
                                        <p class="card-text mb-2">
                                            <strong>Status:</strong>
                                            @if($item->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </p>
                                        @if($item->redeem_limit)
                                            <p class="card-text mb-2">
                                                <strong>Redeem Limit:</strong> {{ $item->redeem_limit }} per user
                                            </p>
                                        @endif
                                        {{-- Add any other info needed before exchange here --}}
                                        <form action="{{ route('point-shop.exchange') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i class="fas fa-gift"></i> Exchange with Points
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-warning">
                            Item not found.
                        </div>
                    </div>
                @endif
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
