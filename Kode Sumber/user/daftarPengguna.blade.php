

@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
            <a href="/dashboard" class="btn btn-secondary">Go to dashboard</a>
            <a href="/userRegistration" class="btn btn-primary">Add Data</a>
            <h1></h1>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush