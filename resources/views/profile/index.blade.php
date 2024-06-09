@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 600px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Профіль</h2>

            <div class="mb-3">
                <label for="name" class="form-label">Ім'я</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" readonly>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            @if($claim)
            <div class="mb-3">
                <label for="contact" class="form-label">Телефон</label>
                <input type="text" id="contact" name="contact" class="form-control" value="{{ $claim->contact }}" readonly>
            </div>
            @endif

            @if($user->card_number)
                <div class="mb-3">
                    <label for="card_number" class="form-label">Номер картки</label>
                    <input type="text" id="card_number" name="card_number" class="form-control" value="{{ $user->card_number }}" readonly>
                </div>
            @endif

            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Редагувати профіль</a>
        </div>
    </div>
@endsection
