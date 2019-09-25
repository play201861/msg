@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>
    <div class="card-body">
        @include('component.messages')
    </div>
</div>

@endsection
