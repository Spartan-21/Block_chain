@extends('backend.partials.parent')

@section('page_title', 'Coffee Batches')

@section('page_content')

@include('backend.partials.flash-messages')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Coffee Batches</h3>
        <div class="card-tools">
            <a href="{{ route('batches.create', ['farm_id' => $farm_id]) }}" class="btn btn-primary btn-sm">Add New Batch</a>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Coffee Type</th>
                    <th>Quantity (kg)</th>
                    <th>Processing Method</th>
                    <th>Quality Grade</th>
                    <th>Farm</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($batches as $key => $batch)
                    <tr>
                        <td>{{ $batch->id }}</td>
                        <td>{{ $batch->coffee_type }}</td>
                        <td>{{ $batch->quantity }}</td>
                        <td>{{ $batch->processing_method }}</td>
                        <td>{{ $batch->quality_grade }}</td>
                        <td>{{ $batch->farm->location ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('batches.view', ['farm_id' => $farm_id, 'batch' => $batch->id]) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('batches.edit', ['farm_id' => $farm_id, 'batch' => $batch->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('batches.destroy', ['farm_id' => $farm_id, 'batch' => $batch->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No batches found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop
