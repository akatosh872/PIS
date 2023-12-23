@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Edit Insurance</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('backend.insurances.update', ['id' => $insurance->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="claim_id">Claim:</label>
                <select name="claim_id" id="claim_id" class="form-control">
                    @foreach($claims as $claim)
                        <option value="{{ $claim->id }}" {{ $claim->id == $insurance->claim_id ? 'selected' : '' }}>
                            {{ $claim->id }} - {{ $claim->information }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $insurance->user_id ? 'selected' : '' }}>
                            {{ $user->name }} - {{ $user->email }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="insurance_type_id">Insurance Type:</label>
                <select name="insurance_type_id" id="insurance_type_id" class="form-control">
                    @foreach($insuranceTypes as $insuranceType)
                        <option value="{{ $insuranceType->id }}" {{ $insuranceType->id == $insurance->insurance_type_id ? 'selected' : '' }}>
                            {{ $insuranceType->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="monthly_fee">Monthly Fee:</label>
                <input type="text" name="monthly_fee" id="monthly_fee" class="form-control" value="{{ $insurance->monthly_fee }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $insurance->start_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $insurance->end_date }}" required>
            </div>
            <div class="form-group">
                <label for="installments">Installments:</label>
                <input type="number" name="installments" id="installments" class="form-control" value="{{ $insurance->installments }}" required>
            </div>
            <div class="form-group">
                <label for="enable">Enable:</label>
                <input type="checkbox" name="enable" id="enable" value="1" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Insurance</button>
        </form>
    </div>
@endsection
