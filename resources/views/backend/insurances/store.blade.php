@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Store Insurance</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('backend.insurances.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="claim_id">Claim:</label>
                <select name="claim_id" id="claim_id" class="form-control">
                    @foreach($claims as $claim)
                        <option value="{{ $claim->id }}">{{ $claim->id }} - {{ $claim->information }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="insurance_type_id">Insurance Type:</label>
                <select name="insurance_type_id" id="insurance_type_id" class="form-control">
                    @foreach($insuranceTypes as $insuranceType)
                        <option value="{{ $insuranceType->id }}">{{ $insuranceType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="monthly_fee">Monthly Fee:</label>
                <input type="text" name="monthly_fee" id="monthly_fee" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="term">Term:</label>
                <input type="number" name="term" id="term" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="installments">Installments:</label>
                <input type="number" name="installments" id="installments" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Store Insurance</button>
        </form>
    </div>
@endsection
