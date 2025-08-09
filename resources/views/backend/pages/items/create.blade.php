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
                        <a href="javascirpt:void(0)">Create</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create New Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('items.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Item Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Upload Thumbnail</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white">
                                            <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="image" class="form-control" type="text" name="image" value="{{ old('image') }}" readonly>
                                    </div>
                                </div>
                                <div id="holder"></div>
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock <span class="text-danger">*</span></label>
                                    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}" required>
                                    @error('stock')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="redeem_limit">Redeem Limit</label>
                                    <input type="number" name="redeem_limit" id="redeem_limit" class="form-control" value="{{ old('redeem_limit') }}">
                                    @error('redeem_limit')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group text-right">
                                    <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Create Item</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
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
