@extends('backend.partials.parent')

@section('page_title', 'Farms List')

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

    
    @permission('create.farms')
    <a href="{{ route('farms.create') }}" class="btn btn-success mb-3">Add New Farm</a>
    @endpermission

    @if($farms->isEmpty())
        <p>No farms registered yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Farmer Name</th>
                    <th>Location</th>
                    <th>Region</th>
                    <th>Altitude</th>
                    <th>Farm Size</th>
                    <th>Coordinates</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($farms as $farm)
                    <tr>
                        <td>{{ $farm->user->firstname . " " . $farm->user->surname }}</td>
                        <td>{{ $farm->location }}</td>
                        <td>{{ $farm->region }}</td>
                        <td>{{ $farm->altitude }}</td>
                        <td>{{ $farm->farm_size }}</td>
                        <td>{{ $farm->coordinates }}</td>
                        <td>
                            <a href="{{ route('farms.view', ['farm_id' => $farm->id]) }}" class="btn btn-info btn-sm">View</a>
                            @permission('edit.farms')
                            <a href="{{ route('farms.edit', ['farm_id' => $farm->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            @endpermission
                            @permission('view.batches')
                            <a href="{{ route('batches', ['farm_id' => $farm->id]) }}" class="btn btn-info btn-sm">Batches</a>
                            @endpermission
                            @permission('delete.farms')
                            <form action="{{ route('farms.destroy', ['farm_id' => $farm->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this farm?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endpermission
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
