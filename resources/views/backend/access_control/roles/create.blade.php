@extends('backend.partials.parent')

@section('page_title', 'Create System Roles')

@section('page_content')

@include('backend.partials.flash-messages')

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Role Details</h3>
    </div>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="role_name">Name</label>
                <input type="text" name="name" id="role_name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
            </div>

            <div class="form-group">
                <label for="permissions">Permissions</label>
                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                    <option data-select2-id="52">Alabama</option>
                    <option data-select2-id="53">Alaska</option>
                    <option data-select2-id="54">California</option>
                    <option data-select2-id="55">Delaware</option>
                    <option data-select2-id="56">Tennessee</option>
                    <option data-select2-id="57">Texas</option>
                    <option data-select2-id="58">Washington</option>
                </select>
                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Register Role</button>
        </div>
    </form>
</div>
@endsection