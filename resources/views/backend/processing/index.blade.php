@extends('backend.partials.parent')

@section('page_title', 'Processings List')

@section('page_content')
@include('backend.partials.flash-messages')

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@permission('create.processing')
<a href="{{ route('processings.create') }}" class="btn btn-success mb-3">Add New Processing</a>
@endpermission

@if($processings->isEmpty())
    <p>No processings recorded yet.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Batch ID</th>
                <th>Output Quantity (kg)</th>
                <th>Status</th>
                <th>Processing Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($processings as $processing)
                <tr>
                    <td>{{ $processing->batch->id ?? '-' }}</td>
                    <td>{{ $processing->output_quantity }}</td>
                    <td>{{ ucfirst($processing->status) }}</td>
                    <td>{{ $processing->processing_date }}</td>
                    <td>
                        @permission('show.processing')
                        <a href="{{ route('processings.show', $processing->id) }}" class="btn btn-info btn-sm">View</a>
                        @endpermission
                        @permission('edit.processing')
                        <a href="{{ route('processings.edit', $processing->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endpermission
                        @permission('delete.processing')
                        <form action="{{ route('processings.destroy', $processing->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this processing?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        @endpermission
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@stop
