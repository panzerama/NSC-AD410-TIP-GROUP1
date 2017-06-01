@extends('layouts.admin-reports-app')

@section('title', 'TIPS Admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<h2>Reports Dashboard</h2>
    <ol class="breadcrumb">
        <li>
            <a href="reports">Reports</a>
        </li>
        <li class="active">
            <strong>Data Table</strong>
        </li>
    </ol>
</div>


    {!! $html->table() !!}

@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush
