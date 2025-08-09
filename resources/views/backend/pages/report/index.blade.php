@extends('backend.layouts.app')

@section('title', 'Report List')

@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Report List</h4>
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
                        <a href="avascirpt:void(0)">Reports Management</a>
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
                            <h4 class="card-title">Reports</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Report By</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Report Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reports as $index => $report)
                                        <tr>
                                            <td>{{ $index + $reports->firstItem() }}</td>
                                            <td>
                                                <a href="{{ route('user.show', $report->user->id) }}">{{ $report->user->name }}</a>
                                            </td>
                                            <td>{{ $report->title }}</td>
                                            <td>{{ $report->location }}</td>
                                            <td>
                                                <div class="
                                                    @if($report->status == 'pending')
                                                        text-warning
                                                    @elseif($report->status == 'accepted')
                                                        text-success
                                                    @elseif($report->status == 'rejected')
                                                        text-danger
                                                    @endif
                                                ">
                                                    @if($report->status == 'pending')
                                                        PENDING
                                                    @elseif($report->status == 'accepted')
                                                        ACCEPTED
                                                    @elseif($report->status == 'rejected')
                                                        REJECTED
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ date('d F Y | H:i', strtotime($report->created_at)) }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- @if($report->status === 'pending') --}}
                                                        <form action="{{ route('report-update-status', $report->id) }}" method="post" style="display:inline;">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="status" value="accepted">
                                                            <button type="submit" class="btn btn-link btn-success btn-lg">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('report-update-status', $report->id) }}" method="post" style="display:inline;">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="status" value="rejected">
                                                            <button type="submit" class="btn btn-link btn-warning btn-lg" title="Toggle Status">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    {{-- @endif --}}
                                                    <button type="button" data-toggle="modal" data-target="#modal" data-id="{{ $report->id }}" class="btn btn-link btn-danger" data-original-title="Remove">
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
