@extends('layouts.backend')

@section('content')
    <h1>Claim Details</h1>

    <p><strong>Contact:</strong> {{ $claim->contact }}</p>
    <p><strong>Information:</strong> {{ $claim->information }}</p>
    <p><strong>Status:</strong> {{ $claim->status->name }}</p>

    <h2>Client Information</h2>
    <p><strong>User ID:</strong> {{ $claim->user->id }}</p>
    <p><strong>Name:</strong> {{ $claim->user->name }}</p>
    <p><strong>Email:</strong> {{ $claim->user->email }}</p>

    <h2>Change Status</h2>
    <form action="{{ route('backend.updateStatus', $claim->id) }}" method="post">
        @csrf
        @method('put')
        <select name="status_id">
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}" {{ $claim->status_id == $status->id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Update Status</button>
    </form>

    <h2>Create Policy</h2>
{{--    <a href="{{ route('backend.policy.create', ['claim_id' => $claim->id]) }}">Create Policy</a>--}}
@endsection
