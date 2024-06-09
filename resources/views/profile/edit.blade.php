@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 600px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Редагування профілю</h2>

            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name" class="form-label">Ім'я</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Телефон</label>
                    <input type="text" id="contact" name="contact" class="form-control" value="{{ old('contact', $user->contact) }}" required>
                </div>

                    <div class="mb-3">
                        <label for="card_number" class="form-label">Номер картки</label>
                        <input type="text" id="card_number" name="card_number" class="form-control" value="{{ old('card_number', $user->card_number) }}">
                    </div>

                <button type="submit" class="btn btn-primary">Оновити профіль</button>
            </form>
        </div>
    </div>
@endsection
