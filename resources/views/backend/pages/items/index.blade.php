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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Items</h4>
                                <a href="{{ route('items.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> New Item
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Redeem Limit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $index => $item)
                                        <tr>
                                            <td>{{ $index + $items->firstItem() }}</td>
                                            <td>
                                                    <img src="{{  $item->image }}" alt="Image" class="img-fluid rounded" style="width:40px; height:40px; object-fit:cover;">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                {{ $item->stock }}
                                            </td>
                                            <td>
                                                @if($item->status === 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->redeem_limit ?? 'No Limit' }}
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-link btn-primary" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-toggle="modal" data-target="#modal" data-id="{{ $item->id }}" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <x-footer/>
</div>

<!-- modal -->
<x-modal type="danger" title="Delete Item" action="{{ route('items.destroy', 'delete') }}" button="Delete">
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
        $('#form-delete').attr('action', 'items/'+id);
    });
});
</script>
@endpush
